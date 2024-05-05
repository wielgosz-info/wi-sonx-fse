<?php
/**
 * Title: 'More Posts' Loop
 * Slug: wi-sonx-fse/loop-more-posts
 * Categories: posts
 *
 * @package WI\SonxFSE
 */

global $next_query_id;
$query_id = isset( $next_query_id ) ? $next_query_id++ : null;

?>

<!-- wp:query {<?php null !== $query_id ? printf( '"queryId": %d,', intval( $query_id ) ) : ''; ?>"query":{"perPage":"3","pages":"4","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"enhancedPagination":true,"className":"wi-loop-more-posts","layout":{"type":"default"}} -->
<div class="wp-block-query wi-loop-more-posts">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":"3","minimumColumnWidth":"15rem"}} -->
	<!-- wp:pattern {"slug":"wi-sonx-fse/loop-post-preview-default"} /-->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"paginationArrow":"chevron","showLabel":false,"className":"wi-loop-more-posts__pagination","layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
	<!-- wp:query-pagination-previous /-->
	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
