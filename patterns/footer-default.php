<?php
/**
 * Title: Default Footer
 * Slug: wi-sonx-fse/footer-default
 * Categories: footer
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"
	style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide"><!-- wp:site-logo {"width":100} /-->

		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}}},"textColor":"contrast-2","fontSize":"small"} -->
		<p class="has-contrast-2-color has-text-color has-link-color has-small-font-size">
			<?php
				/* translators: %1$d: current year, %2$s: site name */
				printf( esc_html__( '©&nbsp;Copyright %1$d %2$s. All rights reserved.', 'wi-sonx-fse' ), intval( gmdate( 'Y' ) ), esc_html( get_bloginfo( 'name' ) ) );
			?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:social-links {"iconBackgroundColor":{},"size":"has-large-icon-size","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}},"className":"is-style-default","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
		<ul class="wp-block-social-links has-large-icon-size is-style-default">
			<!-- wp:social-link {"service":"linkedin"} /-->

			<!-- wp:social-link {"url":"https://github.com/wielgosz-info/wi-sonx-fse","service":"github"} /-->
		</ul>
		<!-- /wp:social-links -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
