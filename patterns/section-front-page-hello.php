<?php
/**
 * Title: Front Page Section: Hello
 * Slug: wi-sonx-fse/section-front-page-hello
 * Categories: about
 * Keywords: front page, section, hello
 * Post Types: page
 * Template Types: front-page
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:wi-sonx-fse/front-page-section {"templateLock":"contentOnly","anchor":"hello","style":{"background":{"backgroundSize":"cover","backgroundPosition":"50% 50%","backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/front-page__hello__bg.svg' ) ) ?>","source":"file","title":""},"backgroundRepeat":"no-repeat"},"dimensions":{"minHeight":"100%"},"spacing":{"padding":{"top":"0","bottom":"0"}}},"lock":{"move":true,"remove":true}} -->
<section
	class="wp-block-wi-sonx-fse-front-page-section alignfull has-contrast-color has-base-background-color has-text-color has-background"
	id="hello" style="min-height:100%;padding-top:0;padding-bottom:0">
	<div class="wp-block-wi-sonx-fse-front-page-section-content">
		<!-- wp:cover {"dimRatio":0,"minHeight":100,"minHeightUnit":"%","contentPosition":"center left","templateLock":"all","lock":{"move":true,"remove":true},"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"spacing":{"padding":{"right":"0","left":"0","top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"textColor":"contrast","className":"is-light","layout":{"type":"constrained"}} -->
		<div class="wp-block-cover has-custom-content-position is-position-center-left is-light has-contrast-color has-text-color has-link-color"
			style="padding-top:var(--wp--preset--spacing--60);padding-right:0;padding-bottom:var(--wp--preset--spacing--60);padding-left:0;min-height:100%">
			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
			<div class="wp-block-cover__inner-container">
				<!-- wp:paragraph {"placeholder":"Content…","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.4em"},"spacing":{"padding":{"left":"var:preset|spacing|10"}}},"textColor":"primary","fontSize":"large"} -->
				<p class="has-primary-color has-text-color has-link-color has-large-font-size"
					style="padding-left:var(--wp--preset--spacing--10);font-style:normal;font-weight:700;letter-spacing:0.4em;text-transform:uppercase">
					<?php esc_html_e( "Hello I'm", 'wi-sonx-fse' ); ?>
				</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1"},"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"fontSize":"Huge"} -->
				<p class="has-huge-font-size"
					style="margin-top:var(--wp--preset--spacing--50);font-style:normal;font-weight:700;line-height:1">
					<?php esc_html_e( "WI Sonx", 'wi-sonx-fse' ); ?><br><?php esc_html_e( "FSE Theme", 'wi-sonx-fse' ); ?>
				</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|60"},"padding":{"left":"var:preset|spacing|10"}}},"fontSize":"large"} -->
				<p class="has-large-font-size"
					style="margin-top:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--10);text-transform:uppercase">
					<?php esc_html_e( "WordPress Full Site Editing", 'wi-sonx-fse' ); ?>
				</p>
				<!-- /wp:paragraph -->
			</div>
		</div>
		<!-- /wp:cover -->
	</div>
</section>
<!-- /wp:wi-sonx-fse/front-page-section -->
