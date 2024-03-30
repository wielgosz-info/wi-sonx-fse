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
	private array $style_fields = array(
		'editorStyle',
		'style',
		'viewStyle',
	);

	protected function __construct() {
		$this->theme_slug = get_template();
		$this->src_dir = 'wp-content/themes/' . $this->theme_slug . '/scripts';
		$this->dist_dir = get_template_directory() . '/dist';

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_editor_assets' ) );

		add_filter( 'block_type_metadata', array( $this, 'update_block_type_metadata' ) );
		// add_filter( 'block_type_metadata_settings', array( $this, 'update_block_type_metadata_settings' ), 10, 2 );
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

	public function update_block_type_metadata_settings( array $settings, array $metadata ): array {
		// Only for theme blocks
		if ( str_starts_with( $metadata['name'], $this->theme_slug ) ) {
			var_dump($settings);
			var_dump($metadata);
		}

		return $metadata;
	}

	public function get_block_asset_args( string $block_path ): array {
		$block_args = array();



		return $block_args;
	}

	private function prepare_block_assets( array $metadata ): array {
		$block_assets = array();

		foreach ( $this->script_fields as $key ) {
			$style_key = str_replace( 'cript', 'tyle', $key );

			if ( $metadata[ $style_key ] && is_null($metadata[ $key ]) ) {
				// we have style but no script, so we need to handle it differently
				// but for now this is not supported, so notify user
				trigger_error( sprintf( 'Block %s has %s but no corresponding script, this is not supported yet', $metadata['name'], $style_key ), E_USER_WARNING );
			} elseif ( $metadata[ $key ] ) {
				// ensure we have array, since $metadata[ $key ] can also be a string
				$script_value = is_array( $metadata[ $key ] ) ? $metadata[ $key ] : [ $metadata[ $key ] ];
				foreach ( $script_value as $index => $script ) {
					if ( str_starts_with( $script, 'file:./' ) ) {
						$block_path = dirname( $metadata['file'] );
						$script_path = remove_block_asset_path_prefix( $script );
						$src_path = str_replace( ABSPATH, '', $block_path ) . '/' . $script_path;
						$handle = generate_block_asset_handle( $metadata['name'], $key, $index );

						$block_assets[ $script ] = array(
							'type' => 'script',
							'place' => $key,
							'src' => $src_path,
							'handle' => $handle,
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

			// Register block assets
			foreach ( $option['block_assets'] as $script => $args ) {
				if ( $args['type'] === 'script' ) {
					Vite\register_asset(
						$this->dist_dir,
						$args['src'],
						array(
							'handle' => $args['handle'],
						),
					);
				}

				// replace the original script with the registered handle
				if ( is_array( $metadata[ $args['place'] ] ) ) {
					$metadata[ $args['place'] ] = array_map(
						function( $value ) use ( $args, $script ) {
							return $value === $script ? $args['handle'] : $value;
						},
						$metadata[ $args['place'] ]
					);
				} else {
					$metadata[ $args['place'] ] = $args['handle'];
				}
			}
		}

		return $metadata;
	}
}
