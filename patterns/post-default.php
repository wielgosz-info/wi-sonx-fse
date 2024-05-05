<?php
/**
 * Title: Default Post
 * Slug: wi-sonx-fse/post-default
 * Categories: theme
 * Inserter: false
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"tagName":"article","metadata":{"name":"Article"},"align":"wide","layout":{"type":"constrained"}} -->
<article class="wp-block-group alignwide">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
	<div class="wp-block-group alignwide"
		style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-title {"level":1,"fontSize":"xx-large"} /-->

		<!-- wp:x3p0/breadcrumbs {"separator":"slash","separatorType":"text","style":{"elements":{"link":{"color":{"text":"var:preset|color|off-contrast"},":hover":{"color":{"text":"var:preset|color|contrast"}}}}},"textColor":"off-contrast","fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-featured-image {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} /-->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group"
		style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-date {"format":"M j, Y","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"accent","textColor":"contrast","fontSize":"small"} /-->

		<!-- wp:post-excerpt {"style":{"layout":{"selfStretch":"fit","flexSize":null},"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"fontSize":"x-large"} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"textColor":"off-contrast","layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"small"} -->
		<div class="wp-block-group has-off-contrast-color has-text-color has-small-font-size">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:avatar {"size":48,"style":{"border":{"radius":"9999px","color":"#ffffff","width":"3px"},"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"margin":{"right":"var:preset|spacing|20"}}}} /-->

				<!-- wp:paragraph -->
				<p>Posted by</p>
				<!-- /wp:paragraph -->

				<!-- wp:post-author-name /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:wi-sonx-fse/icon {"icon":"CommentsCount","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent"} -->
				<span class="wp-block-wi-sonx-fse-icon has-accent-color has-text-color has-link-color"
					data-wp-interactive="WISonxFSEIcon"><svg viewBox="0 0 24 24" version="1.1" aria-hidden="true">
						<path
							d="m2 6c0-1.656 1.344-3 3-3h14c1.656 0 3 1.344 3 3v8c0 1.656-1.344 3-3 3h-3l2 5-6-5h-7c-1.656 0-3-1.344-3-3z">
						</path>
					</svg></span>
				<!-- /wp:wi-sonx-fse/icon -->

				<!-- wp:post-comments-count /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:wi-sonx-fse/icon {"icon":"Views","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent"} -->
				<span class="wp-block-wi-sonx-fse-icon has-accent-color has-text-color has-link-color"
					data-wp-interactive="WISonxFSEIcon"><svg viewBox="0 0 24 24" version="1.1" aria-hidden="true">
						<path
							d="m12 9.201c-1.505 0-2.727 1.255-2.727 2.799 0 1.545 1.222 2.8 2.727 2.8s2.727-1.255 2.727-2.8c0-1.544-1.222-2.799-2.727-2.799z">
						</path>
						<path
							d="m12 5c-4.545 0-8.427 2.903-10 7 1.573 4.097 5.455 7 10 7 4.55 0 8.427-2.903 10-7-1.573-4.097-5.45-7-10-7zm0 11.667c-2.509 0-4.545-2.09-4.545-4.667 0-2.576 2.036-4.666 4.545-4.666s4.545 2.09 4.545 4.666c0 2.577-2.036 4.667-4.545 4.667z">
						</path>
					</svg></span>
				<!-- /wp:wi-sonx-fse/icon -->

				<!-- wp:post-time-to-read /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group"
		style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-content /--></div>
	<!-- /wp:group -->
</article>
<!-- /wp:group -->
