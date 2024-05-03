<?php
/**
 * Title: 'Services Slider' Loop
 * Slug: wi-sonx-fse/loop-services-slider
 * Categories: services, posts
 *
 * @package WI\SonxFSE
 */

global $nextQueryId;
$queryId = isset( $nextQueryId ) ? $nextQueryId++ : null;

?>

<!-- wp:query {<?php $queryId !== null ? printf('"queryId": %d,', $queryId) : ""; ?>"query":{"perPage":12,"pages":1,"offset":0,"postType":"wi-service","order":"asc","orderBy":"title","author":"","search":"","sticky":"","inherit":false},"namespace":"wi-sonx-fse/wi-service-slider","enhancedPagination":true} -->
<div class="wp-block-query">
	<!-- wp:wi-sonx-fse/services-slider -->
	<!-- wp:post-template {"lock":{"move":false,"remove":false},"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null}} -->
	<!-- wp:pattern {"slug":"wi-sonx-fse/loop-post-preview-service"} /-->
	<!-- /wp:post-template -->
	<!-- /wp:wi-sonx-fse/services-slider -->
</div>
<!-- /wp:query -->
