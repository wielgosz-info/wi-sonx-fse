<?php
/**
 * Theme assets
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE;

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
		$this->src_dir = 'assets/scripts';
		$this->dist_dir = get_template_directory() . '/dist';

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
		add_action( 'after_setup_theme', array( $this, 'enqueue_editor_style' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
	}

	public function enqueue_frontend_assets(): void {
		$asset = include get_parent_theme_file_path( 'assets/build/main.asset.php' );

		wp_enqueue_style(
			$this->theme_slug . '-style',
			get_parent_theme_file_uri( 'assets/build/main.css' ),
			$asset['dependencies'],
			$asset['version']
		);
	}

	public function enqueue_editor_style(): void {
		add_editor_style( [
			get_parent_theme_file_uri( 'assets/build/main.css' )
		] );
	}

	public function enqueue_block_editor_assets(): void {
		$asset = include get_parent_theme_file_path( 'assets/build/editor.asset.php'  );

		wp_enqueue_script(
			$this->theme_slug . '-editor',
			get_parent_theme_file_uri( 'assets/build/editor.js' ),
			$asset['dependencies'],
			$asset['version'],
			true
		);

		wp_enqueue_style(
			$this->theme_slug . '-editor',
			get_parent_theme_file_uri( 'assets/build/editor.css' ),
			$asset['dependencies'],
			$asset['version']
		);
	}
}
