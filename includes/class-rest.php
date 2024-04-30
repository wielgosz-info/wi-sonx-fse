<?php
/**
 * Make theme patterns available in REST
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class REST extends Utils\Singleton {
	private $theme_slug;

	public function __construct() {
		$this->theme_slug = get_template();

		add_action( 'rest_api_init', array( $this, 'register_rest_patterns' ) );
	}

	private function convert_blocks( $blocks ) {
		$converted_blocks = array_values(
			array_map(
				function ( $block ) {
					$converted_block = array(
						$block['blockName'],
						$block['attrs'],
					);

					if ( ! empty( $block['innerBlocks'] ) ) {
						$converted_block[] = array_map(
							function ( $inner_block ) {
								return $this->convert_blocks( array( $inner_block ) )[0];
							},
							$block['innerBlocks']
						);
					}

					return $converted_block;
				},
				array_filter(
					$blocks,
					function ( $block ) {
						return ! empty( $block['blockName'] );
					}
				)
			)
		);

		return $converted_blocks;
	}

	public function register_rest_patterns() {
		$registry = \WP_Block_Patterns_Registry::get_instance();
		$patterns = $registry->get_all_registered();
		foreach ( $patterns as $pattern ) {
			$slug_without_prefix = str_replace( $this->theme_slug . '/', '', $pattern['slug'] );

			if ( $slug_without_prefix === $pattern['slug'] ) {
				// We only want to expose patterns that are prefixed with the theme slug.
				continue;
			}

			register_rest_route(
				$this->theme_slug . '/v1',
				'/patterns/' . $slug_without_prefix,
				array(
					'methods'             => 'GET',
					'callback'            => function () use ( $pattern ) {
						unset( $pattern['filePath'] );
						$pattern['blocks'] = $this->convert_blocks( parse_blocks( $pattern['content'] ) );

						return $pattern;
					},
					'permission_callback' => '__return_true',
				)
			);
		}
	}
}
