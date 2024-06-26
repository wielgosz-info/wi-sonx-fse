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

<!-- wp:group {"tagName":"article","metadata":{"categories":["posts"]},"style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"var:preset|spacing|40"}},"className":"wi-loop-post-preview","layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical","justifyContent":"stretch"}} -->
<article class="wp-block-group wi-loop-post-preview" style="min-height:100%">
	<!-- wp:group {"backgroundColor":"base-2","className":"wi-loop-post-preview__image"} -->
	<div class="wp-block-group wi-loop-post-preview__image has-base-2-background-color has-background">
		<!-- wp:post-date {"format":"M j, Y","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"accent","textColor":"contrast","fontSize":"small"} /-->

		<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"1","style":{"layout":{"selfStretch":"fill","flexSize":null}}} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-title {"level":3,"isLink":true,"style":{"layout":{"selfStretch":"fill","flexSize":null}},"textColor":"contrast","fontSize":"large"} /-->

	<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"},":hover":{"color":{"text":"var:preset|color|accent"}}}},"spacing":{"blockGap":"var:preset|spacing|30"}},"textColor":"contrast-2","layout":{"type":"flex"},"fontSize":"small"} -->
	<div class="wp-block-group has-contrast-2-color has-text-color has-link-color has-small-font-size">
		<!-- wp:post-terms {"term":"category"} /-->

		<!-- wp:post-terms {"term":"post_tag","prefix":"#"} /-->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
