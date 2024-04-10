<?php
/**
 * Title: Front Page Section: Blog
 * Slug: wi-sonx-fse/section-front-page-blog
 * Categories: posts
 * Keywords: front page, section, blog
 * Post Types: page
 * Template Types: front-page
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:wi-sonx-fse/front-page-section {"anchor":"blog"} -->
<section
	class="wp-block-wi-sonx-fse-front-page-section alignfull has-contrast-color has-base-background-color has-text-color has-background"
	id="blog" data-wi-toc="true">
	<div class="wp-block-wi-sonx-fse-front-page-section-content">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<div class="wp-block-group"
			style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:heading {"fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-xx-large-font-size">
				<?php esc_html_e( 'Blog', 'wi-sonx-fse' ); ?>
			</h2>
			<!-- /wp:heading -->

			<!-- wp:query {"queryId":0,"query":{"perPage":"3","pages":"4","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"enhancedPagination":true} -->
			<div class="wp-block-query">
				<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":"3","minimumColumnWidth":"15rem"}} -->
				<!-- wp:pattern {"slug":"wi-sonx-fse/loop-post-preview-default"} /-->
				<!-- /wp:post-template -->

				<!-- wp:query-pagination {"paginationArrow":"chevron","showLabel":false,"className":"wi-front-page-loop-pagination","layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
				<!-- wp:query-pagination-previous /-->
				<!-- wp:query-pagination-next /-->
				<!-- /wp:query-pagination -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:group -->
	</div>
</section>
<!-- /wp:wi-sonx-fse/front-page-section -->
