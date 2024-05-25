<?php
/**
 * Theme settings and features
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Theme extends Utils\Singleton {
	public function __construct() {
		// Theme supports.
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );

		// Templates.
		add_filter( 'default_wp_template_part_areas', array( $this, 'template_part_areas' ) );
		add_filter( 'default_template_types', array( $this, 'custom_template_descriptions' ) );

		// Patterns.
		add_action( 'init', array( $this, 'register_theme_pattern_categories' ) );
		add_filter( 'should_load_remote_block_patterns', '__return_false' );
	}

	public function theme_supports() {
		// Most of opt-ins are already in the theme.json file.

		remove_theme_support( 'core-block-patterns' );
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

	public function custom_template_descriptions( array $templates ) {
		$templates['single-wi-project'] = array(
			'title'       => __( 'Single Project', 'wi-sonx-fse' ),
			'description' => __( 'Default template for projects.', 'wi-sonx-fse' ),
		);

		return $templates;
	}

	public function register_theme_pattern_categories() {
		$categories = array(
			array(
				'slug'  => 'wi-sonx-fse/theme',
				'title' => esc_html__( 'Theme', 'wi-sonx-fse' ),
			),
			array(
				'slug'  => 'wi-sonx-fse/front-page-section',
				'title' => esc_html__( 'Front Page Sections', 'wi-sonx-fse' ),
			),
		);

		foreach ( $categories as $category ) {
			register_block_pattern_category( $category['slug'], array( 'label' => $category['title'] ) );
		}
	}

	public function remove_core_patterns() {
		remove_theme_support( 'core-block-patterns' );
	}
}
