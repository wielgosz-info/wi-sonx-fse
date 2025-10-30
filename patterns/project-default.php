<?php
/**
 * Title: Default Project
 * Slug: wi-sonx-fse/project-default
 * Categories: theme
 * Inserter: false
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"tagName":"article","metadata":{"name":"Article","categories":["theme"],"patternName":"wi-sonx-fse/project-default"},"align":"wide","layout":{"type":"constrained"}} -->
<article class="wp-block-group alignwide">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
	<div class="wp-block-group alignwide"
		style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-title {"level":1,"fontSize":"xx-large"} /-->

		<!-- wp:x3p0/breadcrumbs {"separator":"slash","separatorType":"text","style":{"elements":{"link":{"color":{"text":"var:preset|color|off-contrast"},":hover":{"color":{"text":"var:preset|color|contrast"}}}}},"textColor":"off-contrast","fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":"12","minimumColumnWidth":null},"className":"wi-project__info"} -->
	<div class="wp-block-group wi-project__info alignwide">
		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|60"},"layout":{"columnSpan":"5"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group"
			style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:post-terms {"term":"wi-project-category","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700","letterSpacing":"0.65px"},"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}}},"textColor":"contrast-3","fontSize":"small"} /-->

				<!-- wp:post-excerpt {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"x-large"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<?php for ( $wi_sonx_fse_i = 0; $wi_sonx_fse_i < 5; $wi_sonx_fse_i++ ) : ?>
					<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"core/post-meta","args":{"key":"wi-post-type-project-meta-item-<?php echo intval( $wi_sonx_fse_i ); ?>"}}}},"className":"wi-project__meta-item"} -->
					<p class="wi-project__meta-item"></p>
					<!-- /wp:paragraph -->
				<?php endfor; ?>
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"metadata":{"bindings":{"text":{"source":"core/post-meta","args":{"key":"wi-post-type-project-cta-label"}},"url":{"source":"core/post-meta","args":{"key":"wi-post-type-project-cta-url"}},"linkTarget":{"source":"core/post-meta","args":{"key":"wi-post-type-project-cta-new-tab"}}}},"className":"wp-block-button wi-project__cta"} -->
				<div class="wp-block-button wi-project__cta"><a class="wp-block-button__link wp-element-button">wi-post-type-project-cta-label</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:post-featured-image {"aspectRatio":"4/3","style":{"layout":{"columnSpan":"7"}}} /-->
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
