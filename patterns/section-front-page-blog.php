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
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group"
			style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:heading {"fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( "Blog", 'wi-sonx-fse' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->
	</div>
</section>
<!-- /wp:wi-sonx-fse/front-page-section -->
