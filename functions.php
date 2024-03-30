<?php
/**
 * Entrypoint for theme functions and definitions
 *
 * @package WI\SonxFSE
 */

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

// Load the theme settings.
\WI\SonxFSE\Assets::get_instance();
\WI\SonxFSE\Theme::get_instance();
\WI\SonxFSE\Blocks::get_instance();

// Development helpers.
if ( wp_is_development_mode( 'theme' ) ) {
	\WI\SonxFSE\Dev\GlobalStyles::get_instance();

	if ( is_admin() ) {
		\WI\SonxFSE\Dev\AppearanceTools::get_instance();
	}
}
