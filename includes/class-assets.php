<?php
/**
 * Theme assets
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE;

use Kucrut\Vite;

class Assets extends Utils\Singleton {
	private string $dist_dir;
	private string $src_dir;
	private string $theme_slug;

	private array $script_fields = array(
		'editorScript',
		'script',
		'viewScript',
		'viewScriptModule',
	);

	protected function __construct() {
		$this->theme_slug = get_template();
		$this->src_dir = 'wp-content/themes/' . $this->theme_slug . '/scripts';
		$this->dist_dir = get_template_directory() . '/dist';

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_editor_assets' ) );

		add_filter( 'block_type_metadata', array( $this, 'update_block_type_metadata' ) );
	}

	public function enqueue_frontend_assets(): void {
		Vite\enqueue_asset(
			$this->dist_dir,
			$this->src_dir . '/main.ts',
			array(
				'handle' => $this->theme_slug . '-main',
				'dependencies' => array(), // Optional script dependencies. Defaults to empty array.
				'css-dependencies' => array(), // Optional style dependencies. Defaults to empty array.
				'css-media' => 'all', // Optional.
				'css-only' => true, // Optional. Set to true to only load style assets in production mode.
				'in-footer' => true, // Optional. Defaults to false.
			),
		);
	}

	public function enqueue_editor_assets(): void {
		Vite\enqueue_asset(
			$this->dist_dir,
			$this->src_dir . '/editor.ts',
			array(
				'handle' => $this->theme_slug . '-editor',
			),
		);
	}

	/**
	 * Automatically generates stylesheet import script if needed.
	 * It will return metadata field value or false if no auto-generation is needed.
	 *
	 * @param array $metadata
	 * @param string $style_key
	 * @param string $script_key
	 *
	 * @return bool|string
	 */
	private function maybe_generate_style_import( $metadata, $style_key, $script_key ): bool|string {
		if ( $metadata[ $style_key ] && is_null( $metadata[ $script_key ] ) ) {
			trigger_error( sprintf( 'Block %s has %s but no corresponding script, auto-generating', $metadata['name'], $style_key ), E_USER_WARNING );

			$block_path = dirname( $metadata['file'] );
			$auto_import_file = $block_path . '/' . pathinfo( $metadata[ $style_key ], PATHINFO_FILENAME ) . '.ts';

			if ( ! file_exists( $auto_import_file ) ) {
				file_put_contents(
					$auto_import_file,
					sprintf(
						"import './%s';\n",
						remove_block_asset_path_prefix( $metadata[ $style_key ] )
					)
				);
			}

			return 'file:./' . basename( $auto_import_file );
		}

		return false;
	}

	private function prepare_block_assets( array $metadata ): array {
		$block_path = dirname( $metadata['file'] );
		$block_assets = array();

		foreach ( $this->script_fields as $script_key ) {
			$style_key = str_replace( 'cript', 'tyle', $script_key );
			$css_only = false;
			$style_import = $this->maybe_generate_style_import( $metadata, $style_key, $script_key );

			if ( $style_import ) {
				$metadata[ $script_key ] = $style_import;
				$css_only = true;
			}

			if ( $metadata[ $script_key ] ) {
				// ensure we have array, since $metadata[ $key ] can also be a string
				$script_value = is_array( $metadata[ $script_key ] ) ? $metadata[ $script_key ] : [ $metadata[ $script_key ] ];
				foreach ( $script_value as $index => $script ) {
					if ( str_starts_with( $script, 'file:./' ) ) {
						$script_path = remove_block_asset_path_prefix( $script );
						$src_path = str_replace( ABSPATH, '', $block_path ) . '/' . $script_path;
						$handle = generate_block_asset_handle( $metadata['name'], $script_key, $index );

						$block_assets[ $script ] = array(
							'type' => 'script',
							'place' => $script_key,
							'src' => $src_path,
							'handle' => $handle,
							'css-only' => $css_only,
						);

						// if we have corresponding style, it will be registered together
						if ( isset( $metadata[ $style_key ] ) ) {
							$style_value = is_array( $metadata[ $style_key ] ) ? $metadata[ $style_key ] : [ $metadata[ $style_key ] ];
							foreach ( $style_value as $style ) {
								if ( str_starts_with( $style, 'file:./' ) ) {
									// this is how Vite\register_asset will handle style assets
									$style_handle = $handle . '-0';
									$block_assets[ $style ] = array(
										'type' => 'style',
										'place' => $style_key,
										'handle' => $style_handle,
									);
								}
							}
						}
					}
				}
			}
		}

		return $block_assets;
	}

	/**
	 * Register assets and replace handles in metadata.
	 * $metadata is modified in place.
	 *
	 * @param array $metadata
	 * @param array $block_assets
	 *
	 * @return array
	 */
	private function register_assets_and_replace_handles( array $metadata, array $block_assets ): array {
		foreach ( $block_assets as $script => $args ) {
			if ( $args['type'] === 'script' ) {
				Vite\register_asset(
					$this->dist_dir,
					$args['src'],
					array(
						'handle' => $args['handle'],
						'css-only' => $args['css-only'],
					),
				);
			}

			// replace the original script with the registered handle
			if ( is_array( $metadata[ $args['place'] ] ) ) {
				$metadata[ $args['place'] ] = array_map(
					function ($value) use ($args, $script) {
						return $value === $script ? $args['handle'] : $value;
					},
					$metadata[ $args['place'] ]
				);
			} else {
				$metadata[ $args['place'] ] = $args['handle'];
			}
		}

		return $metadata;
	}

	public function update_block_type_metadata( array $metadata ): array {
		// Only for theme blocks
		if ( str_starts_with( $metadata['name'], $this->theme_slug ) ) {
			// Do we have registered block assets stored in metadata?
			$block_slug = str_replace( '/', '-', $metadata['name'] );
			$option = get_option( $block_slug . '-block-assets', array(
				'block_version' => null,
				'block_assets' => array(),
			) );
			$block_version = $metadata['version'] ?: wp_get_theme()->get( 'Version' );

			// If we don't have registered blocks, the block version has changed or we're not in dev mode, refresh block assets
			if ( empty( $option['block_assets'] ) || $option['block_version'] !== $block_version || wp_is_development_mode( 'theme' ) ) {
				$block_assets = $this->prepare_block_assets( $metadata );

				// Update version and blocks
				$option = array(
					'block_version' => $block_version,
					'block_assets' => $block_assets,
				);

				// Store the registered blocks in metadata
				update_option( $block_slug . '-block-assets', $option );
			}

			$metadata = $this->register_assets_and_replace_handles( $metadata, $option['block_assets'] );
		}

		return $metadata;
	}
}
