<?php
/**
 * Title: Default Services Loop
 * Slug: wi-sonx-fse/loop-services-default
 * Categories: posts
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:query {"queryId":1,"query":{"perPage":"12","pages":"0","offset":0,"postType":"wi-service","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false},"enhancedPagination":true,"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","flexWrap":"nowrap","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group">
			<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"18rem"}} -->
			<!-- wp:pattern {"slug":"wi-sonx-fse/loop-post-preview-service"} /-->
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
