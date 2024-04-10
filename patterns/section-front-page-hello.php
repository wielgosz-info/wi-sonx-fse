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

<!-- wp:wi-sonx-fse/front-page-section {"anchor":"hello","style":{"background":{"backgroundSize":"cover","backgroundPosition":"50% 50%","backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/front-page__hello__bg.svg' ) ); ?>","source":"file","title":""},"backgroundRepeat":"no-repeat"}},"inToC":false,"lock":{"move":true,"remove":true}} -->
<section
	class="wp-block-wi-sonx-fse-front-page-section alignfull has-contrast-color has-base-background-color has-text-color has-background"
	id="hello"
	data-wi-toc="false"
	>
	<div class="wp-block-wi-sonx-fse-front-page-section-content">
		<!-- wp:group {"templateLock":"all","lock":{"move":true,"remove":true},"style":{"dimensions":{"minHeight":"100%"},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/front-page__hello__person.png' ) ); ?>","source":"file","title":""},"backgroundPosition":"100% 100%","backgroundSize":"65%","backgroundRepeat":"no-repeat"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"center"}} -->
		<div class="wp-block-group" style="min-height:100%">
			<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-columns are-vertically-aligned-center"
				style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:column {"verticalAlignment":"center","width":"90%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:90%">
					<!-- wp:paragraph {"placeholder":"Content…","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.4em"},"spacing":{"padding":{"left":"var:preset|spacing|10"}}},"textColor":"primary","fontSize":"large"} -->
					<p class="has-primary-color has-text-color has-link-color has-large-font-size"
						style="padding-left:var(--wp--preset--spacing--10);font-style:normal;font-weight:700;letter-spacing:0.4em;text-transform:uppercase">
						<?php esc_html_e( "Hello I'm", 'wi-sonx-fse' ); ?>
					</p>
					<!-- /wp:paragraph -->

					<!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1"},"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"fontSize":"Huge"} -->
					<h1 class="has-huge-font-size"
						style="margin-top:var(--wp--preset--spacing--50);font-style:normal;font-weight:700;line-height:1">
						<?php esc_html_e( 'WI Sonx', 'wi-sonx-fse' ); ?><br><?php esc_html_e( 'FSE Theme', 'wi-sonx-fse' ); ?>
					</h1>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"top":"var:preset|spacing|60"},"padding":{"left":"var:preset|spacing|10"}}},"fontSize":"large"} -->
					<p class="has-large-font-size"
						style="margin-top:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--10);text-transform:uppercase">
						<?php esc_html_e( 'WordPress Full Site Editing', 'wi-sonx-fse' ); ?>
					</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%">
					<!-- wp:spacer {"height":"var:preset|spacing|90"} -->
					<div style="height:var(--wp--preset--spacing--90)" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->
	</div>
</section>
<!-- /wp:wi-sonx-fse/front-page-section -->
