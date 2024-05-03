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

<!-- wp:wi-sonx-fse/front-page-section {"lock":{"move":true,"remove":true}} -->
<section
	class="wp-block-wi-sonx-fse-front-page-section alignfull has-contrast-color has-base-background-color has-text-color has-background"
	id="blog" data-wp-interactive="wi-sonx-fse/front-page-section" data-wp-init="wi-sonx-fse/front-page-toc::callbacks.register">
	<div class="wp-block-wi-sonx-fse-front-page-section__content">
		<!-- wp:group {"templateLock":"all","lock":{"move":true,"remove":true},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<div class="wp-block-group"
			style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:heading {"fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-xx-large-font-size">
				<?php esc_html_e( 'Blog', 'wi-sonx-fse' ); ?>
			</h2>
			<!-- /wp:heading -->

			<!-- wp:group {"className":"wi-front-page-loop-more-posts"} -->
			<div class="wp-block-group wi-front-page-loop-more-posts">
				<!-- wp:pattern {"slug":"wi-sonx-fse/loop-more-posts"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
</section>
<!-- /wp:wi-sonx-fse/front-page-section -->
