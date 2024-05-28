<?php
/**
 * Title: Default Projects Loop
 * Slug: wi-sonx-fse/loop-projects-default
 * Categories: posts
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:query {"queryId":1,"query":{"perPage":"12","pages":"0","offset":0,"postType":"wi-project","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"enhancedPagination":true,"align":"wide","className":"wi-loop-portfolio-grid"} -->
	<div class="wp-block-query alignwide wi-loop-portfolio-grid">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group">
			<!-- wp:wielgosz-info/wi-query-tax-filter {"taxonomy":"wi-project-category","number":8,"buttonClassName":"is-style-pill"} -->
			<div class="wp-block-wielgosz-info-wi-query-tax-filter">
				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
				<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-pill"} -->
					<div class="wp-block-button is-style-pill"><a class="wp-block-button__link wp-element-button"
							href="?query-1-page=1">All</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:wielgosz-info/wi-query-tax-filter -->

			<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"14rem"}} -->
			<!-- wp:group {"tagName":"article","metadata":{"categories":["posts, portfolio"],"patternName":"wi-sonx-fse/loop-post-preview-project","name":"Project Post Preview"},"style":{"spacing":{"blockGap":"0"},"dimensions":{"minHeight":"100%"}},"className":"wi-loop-post-preview-project","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"top","orientation":"vertical"}} -->
			<article class="wp-block-group wi-loop-post-preview-project" style="min-height:100%">
				<!-- wp:group {"backgroundColor":"base-2","className":"wi-loop-post-preview-project-image"} -->
				<div
					class="wp-block-group wi-loop-post-preview-project-image has-base-2-background-color has-background">
					<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/4","style":{"layout":{"selfStretch":"fill","flexSize":null}}} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"layout":{"selfStretch":"fill","flexSize":null}},"className":"wi-loop-post-preview-project__content has-contrast-color has-accent-background-color has-text-color has-background","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
				<div class="wp-block-group wi-loop-post-preview-project__content has-contrast-color has-accent-background-color has-text-color has-background"
					style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
					<!-- wp:post-terms {"term":"wi-project-category","style":{"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase","letterSpacing":"1px"}},"fontSize":"x-small"} /-->

					<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"contrast","fontSize":"large"} /-->
				</div>
				<!-- /wp:group -->
			</article>
			<!-- /wp:group -->
			<!-- /wp:post-template -->

			<!-- wp:pattern {"slug":"wi-sonx-fse/loop-pagination-default"} /-->

			<!-- wp:query-no-results -->
			<!-- wp:pattern {"slug":"wi-sonx-fse/loop-no-results-default"} /-->
			<!-- /wp:query-no-results -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
