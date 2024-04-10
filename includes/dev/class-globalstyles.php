<?php
/**
 * Expose global styles when in development mode
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE\Dev;

class GlobalStyles extends \WI\SonxFSE\Utils\Singleton {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'expose_global_styles' ) );
	}

	/**
	 * Expose global styles when in development mode.
	 * It will save the global styles that WP Core generates from the `theme.json`
	 * to file that is accessible by IDEs and other tools.
	 * This is useful for code completion and other features that require
	 * the global styles to be available in a static file.
	 *
	 * @return void
	 */
	public function expose_global_styles() {
		global $wp_filesystem;

		$stylesheet = wp_get_global_stylesheet();
		$filename   = get_template_directory() . '/global-styles.css';

		$wp_filesystem->put_contents( $filename, $stylesheet );
	}
}
