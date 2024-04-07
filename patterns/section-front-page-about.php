<?php
/**
 * Title: Front Page Section: About
 * Slug: wi-sonx-fse/section-front-page-about
 * Categories: about
 * Keywords: front page, section, about
 * Post Types: page
 * Template Types: front-page
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:wi-sonx-fse/front-page-section {"anchor":"about","lock":{"move":true,"remove":true}} -->
<section
	class="wp-block-wi-sonx-fse-front-page-section alignfull has-contrast-color has-base-background-color has-text-color has-background"
	id="about" data-wi-toc="true">
	<div class="wp-block-wi-sonx-fse-front-page-section-content">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch"}} -->
		<div class="wp-block-group"
			style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"fontSize":"xx-large"} -->
					<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( "About me", 'wi-sonx-fse' ); ?></h2>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}}},"textColor":"off-contrast","fontSize":"medium"} -->
				<div class="wp-block-column has-off-contrast-color has-text-color has-link-color has-medium-font-size">
					<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}}} -->
					<p style="margin-bottom:var(--wp--preset--spacing--60)">Tristique fames sed aliquet ultricies eget
						viverra arcu vitae dipiscing polomius consequat maecenas turpis metus sit dac quam nunc amet
						tristique.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p>Purus leo in varius ac quam nunc amet tristique volutpat a dipiscing polomius consequa.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:paragraph -->
					<p>a</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:paragraph -->
					<p>b</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:paragraph -->
					<p>c</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:paragraph -->
					<p>d</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:paragraph -->
					<p>e</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->
	</div>
</section>
<!-- /wp:wi-sonx-fse/front-page-section -->
