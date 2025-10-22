<?php
/**
 * Services Slider Block Template.
 *
 * @param   array $attributes - The block attributes.
 * @param   string $content - The block default content.
 * @param   WP_Block $block - The block instance.
 *
 * @package \WI\SonxFSE
 */

list(
	'columnCount' => $wi_sonx_fse_column_count,
	'blockGap'    => $wi_sonx_fse_block_gap
)                             = $attributes;
$wi_sonx_fse_parsed_block_gap = wp_style_engine_get_styles(
	array(
		'dimensions' => array(
			'minHeight' => $wi_sonx_fse_block_gap, // Use min height since block gap is not working.
		),
	)
)['declarations']['min-height'];

$wi_sonx_fse_properties = array(
	'--wi--services-slider--columns' => esc_attr( $wi_sonx_fse_column_count ),
	'--wi--services-slider--gap'     => esc_attr( $wi_sonx_fse_parsed_block_gap ),
);
$wi_sonx_fse_style      = array_reduce(
	array_keys( $wi_sonx_fse_properties ),
	function ( $carry, $item ) use ( $wi_sonx_fse_properties ) {
		return $carry . $item . ': ' . $wi_sonx_fse_properties[ $item ] . ';';
	},
	''
);

$wi_sonx_fse_block_class_name = 'wp-block-' . str_replace( '/', '-', $block->name );
$wi_sonx_fse_child_class      = fn( $child ) => print ( esc_attr( sprintf( '%s__%s', $wi_sonx_fse_block_class_name, $child ) ) );

?>

<div
	<?php
	echo get_block_wrapper_attributes(
		array(
			'style' => $wi_sonx_fse_style,
		)
	);
	?>
	data-wp-interactive="wi-sonx-fse/services-slider"
	<?php
	echo wp_interactivity_data_wp_context(
		array(
			'autoPlay'    => $attributes['autoPlay'],
			'interval'    => $attributes['interval'],
			'activeSlide' => 0,
			'slides'      => array(),
		)
	);
	?>
	data-wp-run="callbacks.run" data-wp-init--in-view="callbacks.initInView" data-wp-init--slider="callbacks.init"
	data-wp-watch--interval="callbacks.watchInterval" data-wp-watch--intersection="callbacks.watchIntersection"
	data-wp-on-window--resize="callbacks.onResize" data-wp-on-document--visibilitychange="callbacks.onVisibilityChange"
	data-wp-on--mouseenter="actions.pause" data-wp-on--mouseleave="actions.maybePlay"
	data-wp-on--focusin="actions.pause" data-wp-on--focusout="actions.maybePlay" data-wp-on--touchstart="actions.pause">
	<div class="<?php $wi_sonx_fse_child_class( 'slides' ); ?>">
		<?php
			// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $content;
			// phpcs:enable
		?>
	</div>
	<div class="<?php $wi_sonx_fse_child_class( 'pagination' ); ?>">
		<button class="<?php $wi_sonx_fse_child_class( 'prev' ); ?>" data-wp-on--click="actions.prevSlide"
			aria-label="<?php esc_attr_e( 'Previous Slide', 'wi-sonx-fse' ); ?>">
			<span aria-hidden="true">«</span>
		</button>
		<ol class="<?php $wi_sonx_fse_child_class( 'dots' ); ?>">
			<template data-wp-each="context.slides">
				<li>
					<button class="<?php $wi_sonx_fse_child_class( 'dot' ); ?>" data-wp-on--click="actions.goToSlide"
						data-wp-class--is-active="callbacks.isActiveDot">
						<span class="screen-reader-text">
							<?php esc_html_e( 'Go to Slide', 'wi-sonx-fse' ); ?>
							<span data-wp-text="callbacks.dotIndex"></span>
						</span>
					</button>
				</li>
			</template>
		</ol>
		<button class="<?php $wi_sonx_fse_child_class( 'next' ); ?>" data-wp-on--click="actions.nextSlide"
			aria-label="<?php esc_attr_e( 'Next Slide', 'wi-sonx-fse' ); ?>">
			<span aria-hidden="true">»</span>
		</button>
	</div>
</div>
