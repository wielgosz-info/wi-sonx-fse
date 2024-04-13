<?php
/**
 * Theme settings and features
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE;

class Theme extends Utils\Singleton {
	public function __construct() {
		add_action( 'init', array( $this, 'register_theme_pattern_categories' ) );
		add_action( 'after_setup_theme', array( $this, 'remove_core_patterns' ) );

		add_filter( 'default_wp_template_part_areas', array( $this, 'template_part_areas' ) );
		add_filter( 'should_load_remote_block_patterns', '__return_false' );
	}

	public function template_part_areas( array $areas ) {
		$areas[] = array(
			'area'        => 'loop',
			'area_tag'    => 'section',
			'label'       => __( 'Loop', 'wi-sonx-fse' ),
			'description' => __( 'Posts loop section', 'wi-sonx-fse' ),
			'icon'        => 'layout',
		);

		return $areas;
	}

	public function register_theme_pattern_categories() {
		register_block_pattern_category(
			'theme',
			array( 'label' => __( 'Theme', 'wi-sonx-fse' ) )
		);
	}

	public function remove_core_patterns() {
		remove_theme_support( 'core-block-patterns' );
	}
}
