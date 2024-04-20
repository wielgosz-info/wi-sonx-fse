<?php
/**
 * Title: 'Services Slider' Loop
 * Slug: wi-sonx-fse/loop-services-slider
 * Categories: services, posts
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:query {"query":{"perPage":12,"pages":1,"offset":0,"postType":"wi-service","order":"asc","orderBy":"title","author":"","search":"","sticky":"","inherit":false},"namespace":"wi-sonx-fse/wi-service-slider"} -->
<div class="wp-block-query"><!-- wp:wi-sonx-fse/services-slider -->
	<div style="--wi--services-slider--columns:3;--wi--services-slider--gap:var(--wp--preset--spacing--60)"
		class="wp-block-wi-sonx-fse-services-slider" data-wp-interactive="WISonxFSEServicesSlider"
		data-wp-context="{&quot;autoPlay&quot;:true,&quot;interval&quot;:5000,&quot;activeSlide&quot;:0,&quot;slides&quot;:[]}"
		data-wp-init--in-view="callbacks.initInView"
			data-wp-init--slider="callbacks.init" data-wp-on-window--resize="callbacks.onResize"
		data-wp-on-document--visibilitychange="callbacks.onVisibilityChange"
		data-wp-watch--interval="callbacks.watchInterval" data-wp-watch--intersection="callbacks.watchIntersection"
		data-wp-on--mouseenter="actions.pause" data-wp-on--mouseleave="actions.maybePlay"
		data-wp-on--focusin="actions.pause" data-wp-on--focusout="actions.maybePlay"
		data-wp-on--touchstart="actions.pause">
		<div class="wp-block-wi-sonx-fse-services-slider-slides">
			<!-- wp:post-template {"lock":{"move":false,"remove":false},"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null}} -->
			<!-- wp:pattern {"slug":"wi-sonx-fse/loop-post-preview-service"} /-->
			<!-- /wp:post-template -->
		</div>
		<div class="wp-block-wi-sonx-fse-services-slider-pagination"><button
				class="wp-block-wi-sonx-fse-services-slider-prev" data-wp-on--click="actions.prevSlide"
				aria-label="<?php esc_attr_e( 'Previous Slide', 'wi-sonx-fse' ); ?>"><span
					aria-hidden="true">«</span></button>
			<ol class="wp-block-wi-sonx-fse-services-slider-dots"><template data-wp-each="context.slides">
					<li><button class="wp-block-wi-sonx-fse-services-slider-dot" data-wp-on--click="actions.goToSlide"
							data-wp-class--is-active="callbacks.isActiveDot"><span
								class="screen-reader-text"><?php esc_html_e( 'Go to Slide', 'wi-sonx-fse' ); ?><span
									data-wp-text="callbacks.dotIndex"></span></span></button></li>
				</template></ol><button class="wp-block-wi-sonx-fse-services-slider-next"
				data-wp-on--click="actions.nextSlide"
				aria-label="<?php esc_attr_e( 'Next Slide', 'wi-sonx-fse' ); ?>"><span
					aria-hidden="true">»</span></button>
		</div>
	</div>
	<!-- /wp:wi-sonx-fse/services-slider -->
</div>
<!-- /wp:query -->
