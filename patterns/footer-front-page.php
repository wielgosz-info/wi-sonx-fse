<?php
/**
 * Title: Footer on Front Page
 * Slug: wi-sonx-fse/footer-front-page
 * Categories: footer
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"tagName":"footer","layout":{"type":"constrained"}} -->
<footer class="wp-block-group">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"},"fontSize":"small"} -->
	<div class="wp-block-group alignwide has-small-font-size"
		style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}}},"textColor":"contrast-2","fontSize":"small"} -->
		<p class="has-contrast-2-color has-text-color has-link-color has-small-font-size">
			<?php
			/* translators: %1$d: current year, %2$s: site name */
			printf( esc_html__( '©&nbsp;Copyright %1$d %2$s. All rights reserved.', 'wi-sonx-fse' ), intval( gmdate( 'Y' ) ), esc_html( get_bloginfo( 'name' ) ) );
			?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:navigation {"overlayMenu":"never","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} /-->
	</div>
	<!-- /wp:group -->
</footer>
<!-- /wp:group -->
