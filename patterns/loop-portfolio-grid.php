<?php
/**
 * Title: 'Portfolio Grid' Loop
 * Slug: wi-sonx-fse/loop-portfolio-grid
 * Categories: portfolio, posts
 *
 * @package WI\SonxFSE
 */

?>


<!-- wp:query {"query":{"perPage":"8","pages":0,"offset":0,"postType":"wi-project","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"enhancedPagination":true,"className":"wi-loop-portfolio-grid"} -->
<div class="wp-block-query wi-loop-portfolio-grid">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"14rem"}} -->
	<!-- wp:pattern {"slug":"wi-sonx-fse/loop-post-preview-project"} /-->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap"}} -->
	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
