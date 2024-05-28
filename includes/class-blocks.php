<?php
/**
 * Theme-specific blocks registration
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Blocks extends Utils\Singleton {
	public function __construct() {
		add_action( 'init', array( $this, 'register_theme_blocks' ) );
		add_filter( 'block_categories_all', array( $this, 'register_theme_block_categories' ) );
	}

	public function register_theme_block_categories( $categories ) {
		$categories[] = array(
			'slug'  => 'wi-sonx-fse/front-page',
			'title' => esc_html__( 'WI Sonx FSE: Front Page', 'wi-sonx-fse' ),
		);

		$categories[] = array(
			'slug'  => 'wi-sonx-fse/icons',
			'title' => esc_html__( 'WI Sonx FSE: Icons', 'wi-sonx-fse' ),
		);

		return $categories;
	}

	public function register_theme_blocks() {
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

		// If we don't have registered blocks, the theme version has changed or we're in dev mode, refresh blocks.
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
				wp_trigger_error( sprintf( 'Error registering block %s: %s', esc_textarea( $block_path ), esc_textarea( $result->get_error_message() ) ), E_USER_WARNING );
			}
		}
	}
}
