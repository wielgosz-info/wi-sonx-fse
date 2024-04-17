<?php
/**
 * Theme-specific blocks registration
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE\Dev;

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class BlocksVersion extends \WI\SonxFSE\Utils\Singleton {
	private $theme_slug;

	public function __construct() {
		$this->theme_slug = get_template();

		add_filter( 'block_type_metadata', array( $this, 'add_block_version' ) );
	}

	/**
	 * Sets block version based on the version in the index.asset.php file.
	 * Without it, block styles have WP version as a version number,
	 * which causes the styles to be cached indefinitely.
	 */
	public function add_block_version( $metadata ) {
		global $wp_filesystem;

		if ( str_starts_with( $metadata['name'], $this->theme_slug . '/' ) ) {
			$path = dirname( $metadata['file'] );
			$script_asset_raw_path = $path . '/index.asset.php';
			$script_asset_path = wp_normalize_path(
				realpath( $script_asset_raw_path )
			);

			if ( $wp_filesystem->exists( $script_asset_path ) ) {
				$script_asset = require $script_asset_path;
				$metadata['version'] = $script_asset['version'];

				return $metadata;
			}
		}

		return $metadata;
	}
}
