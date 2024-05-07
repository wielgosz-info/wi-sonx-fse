<?php
/**
 * Title: Default Post Loop
 * Slug: wi-sonx-fse/loop-default
 * Categories: posts
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:query {"queryId":14,"query":{"perPage":9,"pages":"0","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"enhancedPagination":true,"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
		<div class="wp-block-group">
			<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:pattern {"slug":"wi-sonx-fse/loop-post-preview-default"} /-->
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
