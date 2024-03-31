<?php
/**
 * Title: Default Post
 * Slug: wi-sonx-fse/post-default
 * Categories: theme
 * Inserter: false
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"tagName":"article","align":"wide","layout":{"type":"constrained"},"metadata":{"name":"Article"}} -->
<article class="wp-block-group alignwide">
	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:post-title {"level":1} /-->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:post-terms {"term":"category"} /-->

			<!-- wp:post-terms {"term":"post_tag"} /-->

			<!-- wp:post-author-name /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-featured-image {"align":"full"} /-->

	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:post-content /-->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
