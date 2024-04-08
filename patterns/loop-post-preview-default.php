<?php
/**
 * Title: Default Post Preview
 * Slug: wi-sonx-fse/loop-post-preview-default
 * Categories: posts
 * Inserter: false
 * Viewport Width: 420
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"tagName":"article","metadata":{"categories":["posts"]},"className":"wi-post-preview","layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical","justifyContent":"stretch"}} -->
<article class="wp-block-group wi-post-preview">
	<!-- wp:group {"backgroundColor":"off-base","className":"wi-post-preview-image"} -->
	<div class="wp-block-group wi-post-preview-image has-off-base-background-color has-background">
		<!-- wp:post-date {"format":"M j, Y","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"primary","textColor":"contrast","fontSize":"small"} /-->

		<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","style":{"layout":{"selfStretch":"fill","flexSize":null}}} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"textColor":"contrast","fontSize":"large"} /-->

	<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|off-contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"spacing":{"blockGap":"var:preset|spacing|30"}},"textColor":"off-contrast","layout":{"type":"flex"},"fontSize":"small"} -->
	<div class="wp-block-group has-off-contrast-color has-text-color has-link-color has-small-font-size">
		<!-- wp:post-terms {"term":"category"} /-->

		<!-- wp:post-terms {"term":"post_tag","prefix":"#"} /-->

		<?php if ( WP_Block_Type_Registry::get_instance()->is_registered( 'core/post-comments-count' ) ): ?>
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"className":"wi-post-preview-comments","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group wi-post-preview-comments">
				<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
					<path d="m2 6c0-1.656 1.344-3 3-3h14c1.656 0 3 1.344 3 3v8c0 1.656-1.344 3-3 3h-3l2 5-6-5h-7c-1.656 0-3-1.344-3-3z"/>
				</svg>
				<!-- wp:post-comments-count /-->
			</div>
			<!-- /wp:group -->
		<?php endif; ?>
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
