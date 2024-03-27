<?php
/**
 * Theme assets
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE;

use Kucrut\Vite;

class Assets {
	private string $dist_dir;

	public function __construct() {
		$this->dist_dir = get_template_directory() . '/dist';

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	public function enqueue_assets(): void {
		Vite\enqueue_asset(
			$this->dist_dir,
			'src/scripts/main.ts',
			array(
				'handle' => 'wi-sonx-fse-main',
				'dependencies' => array(), // Optional script dependencies. Defaults to empty array.
				'css-dependencies' => array(), // Optional style dependencies. Defaults to empty array.
				'css-media' => 'all', // Optional.
				'css-only' => true, // Optional. Set to true to only load style assets in production mode.
				'in-footer' => true, // Optional. Defaults to false.
			),
		);
	}
}
