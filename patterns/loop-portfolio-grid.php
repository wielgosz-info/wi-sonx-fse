<?php
/**
 * Title: 'Portfolio Grid' Loop
 * Slug: wi-sonx-fse/loop-portfolio-grid
 * Categories: portfolio, posts
 *
 * @package WI\SonxFSE
 */

global $next_query_id;
$query_id = isset( $next_query_id ) ? $next_query_id++ : null;

?>


<!-- wp:query {<?php null !== $query_id ? printf( '"queryId": %d,', intval( $query_id ) ) : ''; ?>"query":{"perPage":"8","pages":0,"offset":0,"postType":"wi-project","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"enhancedPagination":true,"className":"wi-loop-portfolio-grid"} -->
<div class="wp-block-query wi-loop-portfolio-grid">
	<!-- wp:wielgosz-info/wi-query-tax-filter {"taxonomy":"wi-project-category","className":"wi-front-page-loop-query-tax-filter"} -->
	<div class="wp-block-wielgosz-info-wi-query-tax-filter wi-front-page-loop-query-tax-filter">
		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-pill"} -->
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

	<!-- wp:query-pagination {"paginationArrow":"chevron","showLabel":false,"layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
	<!-- wp:query-pagination-previous /-->
	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
