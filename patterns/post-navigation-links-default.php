<?php
/**
 * Title: Default Post Navigation Links
 * Slug: wi-sonx-fse/post-navigation-links-default
 * Categories: theme
 * Inserter: false
 *
 * @package WI\SonxFSE
 */

$post_type_label = get_post_type_object( get_post_type() )->labels->singular_name;
// translators: %1$s: Previous, %2$s: Post Type Label, e.g. "Previous Page"
$prev_label      = sprintf('%1s %2s', __( 'Previous', 'wi-sonx-fse' ), $post_type_label );
// translators: %1$s: Next, %2$s: Post Type Label, e.g. "Next Page"
$next_label      = sprintf('%1s %2s', __( 'Next', 'wi-sonx-fse' ), $post_type_label );

?>

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}},"border":{"width":"1px"},"typography":{"fontStyle":"normal","fontWeight":"700"}},"borderColor":"contrast","layout":{"type":"grid","columnCount":"12","minimumColumnWidth":null},"fontSize":"large"} -->
<div class="wp-block-group alignwide has-border-color has-contrast-border-color has-large-font-size"
	style="border-width:1px;margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70);font-style:normal;font-weight:700">
	<?php if ( is_rtl() ) : ?>
		<!-- wp:post-navigation-link {"type":"next","showTitle":true,"linkLabel":true,"label":"<?php echo esc_html( $next_label ); ?>","arrow":"chevron","style":{"layout":{"columnSpan":"5"}}} /-->
	<?php else : ?>
		<!-- wp:post-navigation-link {"type":"previous","showTitle":true,"linkLabel":true,"label":"<?php echo esc_html( $prev_label ); ?>","arrow":"chevron","style":{"layout":{"columnSpan":"5"}}} /-->
	<?php endif; ?>

	<!-- wp:group {"style":{"layout":{"columnSpan":"2"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:wi-sonx-fse/icon {"icon":"Dots","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-3"}}}},"textColor":"contrast-3"} -->
		<span class="wp-block-wi-sonx-fse-icon has-contrast-3-color has-text-color has-link-color"><svg
				viewBox="0 0 24 24" version="1.1" aria-hidden="true">
				<rect x="2" y="2" width="4" height="4"></rect>
				<rect x="10" y="2" width="4" height="4"></rect>
				<rect x="18" y="2" width="4" height="4"></rect>
				<rect x="2" y="10" width="4" height="4"></rect>
				<rect x="10" y="10" width="4" height="4"></rect>
				<rect x="18" y="10" width="4" height="4"></rect>
				<rect x="2" y="18" width="4" height="4"></rect>
				<rect x="10" y="18" width="4" height="4"></rect>
				<rect x="18" y="18" width="4" height="4"></rect>
			</svg></span>
		<!-- /wp:wi-sonx-fse/icon -->
	</div>
	<!-- /wp:group -->

	<?php if ( is_rtl() ) : ?>
		<!-- wp:post-navigation-link {"type":"previous","textAlign":"right","showTitle":true,"linkLabel":true,"label":"<?php echo esc_html( $prev_label ); ?>","arrow":"chevron","style":{"layout":{"columnSpan":"5"}}} /-->
	<?php else : ?>
		<!-- wp:post-navigation-link {"type":"next","textAlign":"right","showTitle":true,"linkLabel":true,"label":"<?php echo esc_html( $next_label ); ?>","arrow":"chevron","style":{"layout":{"columnSpan":"5"}}} /-->
	<?php endif; ?>
</div>
<!-- /wp:group -->
