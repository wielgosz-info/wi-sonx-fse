<?php
/**
 * Theme settings and features
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE;

class Theme extends Utils\Singleton {
	public function __construct() {
		add_filter( 'default_wp_template_part_areas', array( $this, 'template_part_areas' ) );
		add_filter( 'should_load_remote_block_patterns', '__return_false' );
	}

	public function template_part_areas( array $areas ) {
		$areas[] = array(
			'area' => 'loop',
			'area_tag' => 'section',
			'label' => __( 'Loop', 'wi-sonx-fse' ),
			'description' => __( 'Posts loop section', 'wi-sonx-fse' ),
			'icon' => 'layout',
		);

		return $areas;
	}
}
