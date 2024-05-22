<?php
/**
 * Title: Default Page
 * Slug: wi-sonx-fse/page-default
 * Categories: theme
 * Inserter: false
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"tagName":"article","align":"wide","layout":{"type":"constrained"},"metadata":{"name":"Article"}} -->
<article class="wp-block-group alignwide">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
	<div class="wp-block-group alignwide"
		style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-title {"level":1,"fontSize":"xx-large"} /-->

		<!-- wp:x3p0/breadcrumbs {"separator":"slash","separatorType":"text","style":{"elements":{"link":{"color":{"text":"var:preset|color|off-contrast"},":hover":{"color":{"text":"var:preset|color|contrast"}}}}},"textColor":"off-contrast","fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-featured-image {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} /-->

	<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull"
		style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-content {"style":{"spacing":{"blockGap":"var:preset|spacing|50"},"typography":{"lineHeight":"1.8"}},"textColor":"contrast-2","layout":{"type":"constrained"}} /-->
	</div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
