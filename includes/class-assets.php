<?php
/**
 * Theme assets
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE;

class Assets extends Utils\Singleton {
	private string $build_uri;
	private string $build_dir;
	private string $theme_slug;

	protected function __construct() {
		$this->theme_slug = get_template();
		$this->build_uri = get_parent_theme_file_uri( 'build/assets' );
		$this->build_dir = get_parent_theme_file_path( 'build/assets' );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
		add_action( 'after_setup_theme', array( $this, 'enqueue_editor_style' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
	}

	public function enqueue_frontend_assets(): void {
		global $wp_filesystem;

		$asset = include $this->build_dir . '/main.asset.php';

		// Enqueue the main script if it exists (it may not in production mode).
		if ( $wp_filesystem->exists( $this->build_dir . '/main.js' ) ) {
			wp_enqueue_script(
				$this->theme_slug . '-script',
				$this->build_uri . '/main.js',
				$asset['dependencies'],
				$asset['version']
			);
		}

		wp_enqueue_style(
			$this->theme_slug . '-style',
			$this->build_uri . '/main.css',
			array(),
			$asset['version']
		);
	}

	public function enqueue_editor_style(): void {
		add_editor_style(
			array(
				$this->build_uri . '/main.css',
			)
		);
	}

	public function enqueue_block_editor_assets(): void {
		global $wp_filesystem;

		$asset = include $this->build_dir . '/editor.asset.php';

		// Enqueue the editor script if it exists (it may not in production mode).
		if ( $wp_filesystem->exists( $this->build_dir . '/editor.js' ) ) {
			wp_enqueue_script(
				$this->theme_slug . '-editor',
				$this->build_uri . '/editor.js',
				$asset['dependencies'],
				$asset['version'],
				true
			);
		}

		wp_enqueue_style(
			$this->theme_slug . '-editor',
			$this->build_uri . '/editor.css',
			array(),
			$asset['version']
		);
	}
}
