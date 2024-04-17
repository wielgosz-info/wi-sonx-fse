<?php
/**
 * Entrypoint for theme functions and definitions
 *
 * @package WI\SonxFSE
 */

global $wp_filesystem;

// Make sure that the above variable is properly setup.
require_once ABSPATH . 'wp-admin/includes/file.php';
WP_Filesystem();

// Load classes
require_once __DIR__ . '/includes/utils/class-singleton.php';
require_once __DIR__ . '/includes/class-assets.php';
require_once __DIR__ . '/includes/class-blocks.php';
require_once __DIR__ . '/includes/class-theme.php';
require_once __DIR__ . '/includes/class-rest.php';
require_once __DIR__ . '/includes/dev/class-blocksversion.php';
require_once __DIR__ . '/includes/dev/class-globalstyles.php';
require_once __DIR__ . '/includes/dev/class-appearancetools.php';


// Load the theme settings.
\WI\SonxFSE\Assets::get_instance();
\WI\SonxFSE\Theme::get_instance();
\WI\SonxFSE\Blocks::get_instance();
\WI\SonxFSE\REST::get_instance();

// Development helpers.
if ( wp_is_development_mode( 'theme' ) ) {
	\WI\SonxFSE\Dev\GlobalStyles::get_instance();
	\WI\SonxFSE\Dev\BlocksVersion::get_instance();

	if ( is_admin() ) {
		\WI\SonxFSE\Dev\AppearanceTools::get_instance();
	}
}
