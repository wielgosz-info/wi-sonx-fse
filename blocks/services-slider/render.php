<?php
/**
 * Services Slider Block Template.
 *
 * @param   array $attributes - The block attributes.
 * @param   string $content - The block default content.
 * @param   WP_Block $block - The block instance.
 */

list( 'columnCount' => $column_count, 'blockGap' => $block_gap ) = $attributes;
$parsed_block_gap = wp_style_engine_get_styles( array(
	'dimensions' => array(
		'minHeight' => $block_gap, // use min height since for whatever reason block gap is not working
	),
) )['declarations']['min-height'];

$properties = array(
	'--wi--services-slider--columns' => esc_attr($column_count),
	'--wi--services-slider--gap' => esc_attr($parsed_block_gap),
);
$style = array_reduce( array_keys( $properties ), function ($carry, $item) use ($properties) {
	return $carry . $item . ': ' . $properties[ $item ] . ';';
}, '' );

$wrapper_attributes = get_block_wrapper_attributes( array(
	'style' => $style
) );

$block_class_name = 'wp-block-' . str_replace( '/', '-', $block->name );

?>

<div <? echo $wrapper_attributes; ?> data-wp-interactive="wi-sonx-fse/services-slider" <?php echo wp_interactivity_data_wp_context( array(
		'autoPlay' => $attributes['autoPlay'],
		'interval' => $attributes['interval'],
		'activeSlide' => 0,
		'slides' => [],
	) ); ?>
	data-wp-run="callbacks.run"
	data-wp-init--in-view="callbacks.initInView"
	data-wp-init--slider="callbacks.init" data-wp-watch--interval="callbacks.watchInterval"
	data-wp-watch--intersection="callbacks.watchIntersection" data-wp-on-window--resize="callbacks.onResize"
	data-wp-on-document--visibilitychange="callbacks.onVisibilityChange" data-wp-on--mouseenter="actions.pause"
	data-wp-on--mouseleave="actions.maybePlay" data-wp-on--focusin="actions.pause"
	data-wp-on--focusout="actions.maybePlay" data-wp-on--touchstart="actions.pause">
	<div class="<?php esc_attr_e( $block_class_name . '-slides' ); ?>">
		<?php echo $content; ?>
	</div>
	<div class="<?php esc_attr_e( $block_class_name . '-pagination' ); ?>">
		<button class="<?php esc_attr_e( $block_class_name . '-prev' ); ?>" data-wp-on--click="actions.prevSlide"
			aria-label="<?php esc_attr_e( 'Previous Slide', 'wi-sonx-fse' ); ?>">
			<span aria-hidden="true">«</span>
		</button>
		<ol class="<?php esc_attr_e( $block_class_name . '-dots' ); ?>">
			<template data-wp-each="context.slides">
				<li>
					<button class="<?php esc_attr_e( $block_class_name . '-dot' ); ?>"
						data-wp-on--click="actions.goToSlide" data-wp-class--is-active="callbacks.isActiveDot">
						<span class="screen-reader-text">
							<?php esc_html_e( 'Go to Slide', 'wi-sonx-fse' ); ?>
							<span data-wp-text="callbacks.dotIndex"></span>
						</span>
					</button>
				</li>
			</template>
		</ol>
		<button class="<?php esc_attr_e( $block_class_name . '-next' ); ?>" data-wp-on--click="actions.nextSlide"
			aria-label="<?php esc_attr_e( 'Next Slide', 'wi-sonx-fse' ); ?>">
			<span aria-hidden="true">»</span>
		</button>
	</div>
</div>
