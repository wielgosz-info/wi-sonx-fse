<?php
/**
 * Entrypoint for theme functions and definitions
 *
 * @package WI\SonxFSE
 */

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

// Load the theme settings.
new \WI\SonxFSE\Assets();
new \WI\SonxFSE\Theme();

// Development helpers.
if ( wp_is_development_mode( 'theme' ) ) {
	new \WI\SonxFSE\Dev\GlobalStyles();

	if ( is_admin() ) {
		new \WI\SonxFSE\Dev\AppearanceTools();
	}
}
