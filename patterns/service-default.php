<?php
/**
 * Title: Default Service
 * Slug: wi-sonx-fse/service-default
 * Categories: theme
 * Inserter: false
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"tagName":"article","metadata":{"name":"Article","categories":["theme"],"patternName":"wi-sonx-fse/service-default"},"align":"wide","layout":{"type":"constrained"}} -->
<article class="wp-block-group alignwide">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
	<div class="wp-block-group alignwide"
		style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-title {"level":1,"fontSize":"xx-large"} /-->

		<!-- wp:x3p0/breadcrumbs {"separator":"slash","separatorType":"text","style":{"elements":{"link":{"color":{"text":"var:preset|color|off-contrast"},":hover":{"color":{"text":"var:preset|color|contrast"}}}}},"textColor":"off-contrast","fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60","padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"backgroundColor":"accent","textColor":"contrast","layout":{"type":"grid"}} -->
	<div class="wp-block-group alignwide has-contrast-color has-accent-background-color has-text-color has-background has-link-color"
		style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
		<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"top"}} -->
		<div class="wp-block-group">
			<!-- wp:group {"style":{"border":{"radius":"50%"},"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}},"layout":{"selfStretch":"fit","flexSize":null}},"backgroundColor":"contrast","layout":{"type":"default"}} -->
			<div class="wp-block-group has-contrast-background-color has-background"
				style="border-radius:50%;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
				<!-- wp:post-featured-image {"aspectRatio":"1","height":"","scale":"contain"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"},"layout":{"columnSpan":"3"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:post-excerpt {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"x-large"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull"
		style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-content {"style":{"spacing":{"blockGap":"var:preset|spacing|50"},"typography":{"lineHeight":"1.8"}},"textColor":"contrast-2","layout":{"type":"constrained"}} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:pattern {"slug":"wi-sonx-fse/post-navigation-links-default"} /-->
</article>
<!-- /wp:group -->
