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

<!-- wp:group {"tagName":"article","layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical"}} -->
<article class="wp-block-group">
	<!-- wp:post-featured-image {"isLink":true} /-->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:post-terms {"term":"category","fontSize":"small"} /-->

		<!-- wp:post-terms {"term":"post_tag","fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-title {"isLink":true} /-->

	<!-- wp:post-excerpt /-->
</article>
<!-- /wp:group -->
