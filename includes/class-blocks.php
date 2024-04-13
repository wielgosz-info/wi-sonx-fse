<?php
/**
 * Theme-specific blocks registration
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE;

class Blocks extends Utils\Singleton {
	public function __construct() {
		add_action( 'init', array( $this, 'register_blocks' ) );
		add_filter( 'block_categories_all', array( $this, 'register_theme_block_categories' ) );
	}

	public function register_blocks() {
		$this->register_theme_pattern_categories();
		$this->register_theme_blocks();
	}

	public function register_theme_block_categories($categories) {
		$categories[] = array(
			'slug'  => 'wi-sonx-fse',
			'label' => esc_html__( 'WI Sonx FSE', 'wi-sonx-fse' ),
			'icon'  => null,
		);

		$categories[] = array(
			'slug'  => 'wi-sonx-fse/icons',
			'label' => esc_html__( 'WI Sonx FSE: Icons', 'wi-sonx-fse' ),
			'icon'  => null,
		);

		return $categories;
	}

	public function register_theme_pattern_categories() {
		$categories = array(
			array(
				'slug'  => 'wi-sonx-fse',
				'title' => esc_html__( 'WI Sonx FSE', 'wi-sonx-fse' ),
			),
			array(
				'slug'  => 'wi-sonx-fse/front-page-section',
				'title' => esc_html__( 'Front Page Sections', 'wi-sonx-fse' ),
			),
		);

		foreach ( $categories as $category ) {
			register_block_pattern_category( $category['slug'], array( 'label' => $category['title'] ) );
		}
	}

	private function register_theme_blocks() {
		// Do we have registered blocks stored in metadata?
		// Also check if theme version has changed.
		$option        = get_option(
			get_template() . '-blocks',
			array(
				'theme_version' => null,
				'blocks'        => array(),
			)
		);
		$theme_version = wp_get_theme()->get( 'Version' );
		$blocks        = array();

		// If we don't have registered blocks, the theme version has changed or we're not in dev mode, refresh blocks.
		if ( empty( $option['blocks'] ) || $option['theme_version'] !== $theme_version || wp_is_development_mode( 'theme' ) ) {
			$blocks = glob( get_parent_theme_file_path( 'build/blocks' ) . '/*', GLOB_ONLYDIR );

			// Update version and blocks.
			$option = array(
				'theme_version' => $theme_version,
				'blocks'        => $blocks,
			);

			// Store the registered blocks in metadata.
			update_option( get_template() . '-blocks', $option );
		}

		// Register blocks.
		foreach ( $option['blocks'] as $block_path ) {
			$result = register_block_type( $block_path );

			if ( is_wp_error( $result ) && defined( 'WP_DEBUG' ) && WP_DEBUG === true ) {
				error_log( sprintf( 'Error registering block %s: %s', esc_textarea( $block_path ), esc_textarea( $result->get_error_message() ) ), E_USER_WARNING );
			}
		}
	}
}
