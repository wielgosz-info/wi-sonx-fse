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
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical","justifyContent":"stretch"}} -->
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
			<!-- wp:pattern {"slug":"wi-sonx-fse/loop-post-preview-project"} /-->
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
