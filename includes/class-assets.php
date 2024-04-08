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

		add_action( 'enqueue_block_assets', array( $this, 'register_block_assets' ), 5 );
		add_filter( 'block_type_metadata', array( $this, 'update_block_type_metadata' ) );
		add_filter( 'vite_for_wp__development_assets', array( $this, 'handle_view_modules' ), 10, 4);
		add_filter( 'vite_for_wp__production_assets', array( $this, 'handle_view_modules' ), 10, 4);

		if ( wp_is_development_mode( 'theme' ) && is_admin() ) {
			add_action( 'enqueue_block_assets', array( $this, 'enqueue_block_editor_styles' ) );
		}
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
				'dependencies' => array( 'wp-blocks' ),
				'css-only' => true,
				'in-footer' => true,
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
		if ( isset( $metadata[ $style_key ] ) && ! isset( $metadata[ $script_key ] ) ) {
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

			if ( isset( $metadata[ $script_key ] ) ) {
				// ensure we have array, since $metadata[ $key ] can also be a string
				$script_value = is_array( $metadata[ $script_key ] ) ? $metadata[ $script_key ] : [ $metadata[ $script_key ] ];
				foreach ( $script_value as $index => $script ) {
					if ( str_starts_with( $script, 'file:./' ) ) {
						$script_path = remove_block_asset_path_prefix( $script );
						$script_src_path = str_replace( ABSPATH, '', $block_path ) . '/' . $script_path;
						$script_handle = generate_block_asset_handle( $metadata['name'], $script_key, $index );

						$block_assets[ $script ] = array(
							'type' => 'script',
							'place' => $script_key,
							'src' => $script_src_path,
							'handle' => $script_handle,
							'css-only' => $css_only,
						);

						// if we have corresponding style, it will be registered together
						if ( isset( $metadata[ $style_key ] ) ) {
							$style_value = is_array( $metadata[ $style_key ] ) ? $metadata[ $style_key ] : [ $metadata[ $style_key ] ];
							foreach ( $style_value as $style ) {
								if ( str_starts_with( $style, 'file:./' ) ) {
									$style_src_path = str_replace( ABSPATH, '', $block_path ) . '/' . remove_block_asset_path_prefix( $style );
									// this is how Vite\register_asset will handle style assets
									$style_handle = $script_handle . '-0';
									$block_assets[ $style ] = array(
										'type' => 'style',
										'place' => $style_key,
										'src' => $style_src_path,
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
	 * Registers block assets.
	 */
	public function register_block_assets(): void {
		[ 'blocks' => $blocks ] = get_option( get_template() . '-blocks', array(
			'blocks' => array(),
		) );

		foreach ( $blocks as $block_path ) {
			$block_slug = $this->theme_slug . '-' . basename( $block_path );

			[ 'block_assets' => $block_assets ] = get_option( $block_slug . '-block-assets', array(
				'block_assets' => array(),
			) );

			foreach ( $block_assets as $args ) {
				if ( $args['type'] === 'script' ) {
					Vite\register_asset(
						$this->dist_dir,
						$args['src'],
						array(
							'handle' => $args['handle'],
							'css-only' => $args['css-only'],
							'in-footer' => true,
							'place' => $args['place'], // pass place as extra option so we can access it in filter
						),
					);
				}
			}
		}
	}

	/**
	 * Enqueues block editor styles - they are not added automatically in dev mode,
	 * since hot reloading relies on them being imported from JS.
	 * Note: this will ensure the editor styles are visible, but it will not hot reload them.
	 * Also, ensure the contents have more specificity than the default styles,
	 * as they will be loaded first.
	 */
	public function enqueue_block_editor_styles(): void {
		$manifest = Vite\get_manifest( $this->dist_dir );
		if ( ! $manifest->is_dev ) {
			return;
		}

		[ 'blocks' => $blocks ] = get_option( get_template() . '-blocks', array(
			'blocks' => array(),
		) );

		foreach ( $blocks as $block_path ) {
			$block_slug = $this->theme_slug . '-' . basename( $block_path );

			[ 'block_assets' => $block_assets ] = get_option( $block_slug . '-block-assets', array(
				'block_assets' => array(),
			) );

			foreach ( $block_assets as $args ) {
				if ( $args['place'] === 'editorStyle' ) {
					$src = Vite\generate_development_asset_src( $manifest, $args['src'] );
					wp_enqueue_style( $args['handle'], $src, array(), null );
				}
			}
		}
	}

	private function replace_block_asset_handles( array $metadata, array $block_assets ): array {
		foreach ( $block_assets as $script => $args ) {
			if ( isset( $metadata[ $args['place'] ] ) && is_array( $metadata[ $args['place'] ] ) ) {
				// replace the registered handle with the original script
				$metadata[ $args['place'] ] = array_map(
					function ($value) use ($args, $script) {
						return $value === $script ? $args['handle'] : $value;
					},
					$metadata[ $args['place'] ]
				);
			} else {
				// if the block doesn't have the asset, add it
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
			$block_version = isset( $metadata['version'] ) ? $metadata['version'] : wp_get_theme()->get( 'Version' );

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

			$metadata = $this->replace_block_asset_handles( $metadata, $option['block_assets'] );
		}

		return $metadata;
	}

	public function handle_view_modules($assets, $manifest, $entry, $options) {
		if ( $options['place'] === 'viewScriptModule' ) {
			$handle = $assets['scripts'][0];
			$src = wp_scripts()->registered[$handle]->src;
			wp_deregister_script($handle);
			wp_register_script_module($handle, $src, array(), null, true);
		}

		return $assets;
	}
}
