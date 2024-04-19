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
		data-wp-context="{&quot;autoPlay&quot;:true,&quot;interval&quot;:5000}" data-wp-init="callbacks.init"
		data-wp-on-window--resize="callbacks.onResize"
		data-wp-on-document--visibilitychange="callbacks.onVisibilityChange"
		data-wp-watch--interval="callbacks.watchInterval" data-wp-watch--intersection="callbacks.watchIntersection">
		<div class="wp-block-wi-sonx-fse-services-slider-slides" data-wp-on--mouseenter="actions.disableAutoPlay"
			data-wp-on--mouseleave="actions.enableAutoPlay" data-wp-on--focusin="actions.disableAutoPlay"
			data-wp-on--focusout="actions.enableAutoPlay" data-wp-on--touchstart="actions.disableAutoPlay">
			<!-- wp:post-template {"lock":{"move":false,"remove":false},"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null}} -->
			<!-- wp:pattern {"slug":"wi-sonx-fse/loop-post-preview-service"} /-->
			<!-- /wp:post-template -->
		</div>
		<div class="wp-block-wi-sonx-fse-services-slider-pagination"><button
				class="wp-block-wi-sonx-fse-services-slider-prev" data-wp-on--click="actions.prevSlide">Previous
				item</button><button class="wp-block-wi-sonx-fse-services-slider-next"
				data-wp-on--click="actions.nextSlide">Next item</button></div>
	</div>
	<!-- /wp:wi-sonx-fse/services-slider -->
</div>
<!-- /wp:query -->
