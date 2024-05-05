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

<!-- wp:group {"tagName":"article","metadata":{"name":"Article","categories":["theme"],"patternName":"wi-sonx-fse/post-default"},"align":"wide","layout":{"type":"constrained"}} -->
<article class="wp-block-group alignwide">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
	<div class="wp-block-group alignwide"
		style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-title {"level":1,"fontSize":"xx-large"} /-->

		<!-- wp:x3p0/breadcrumbs {"separator":"slash","separatorType":"text","style":{"elements":{"link":{"color":{"text":"var:preset|color|off-contrast"},":hover":{"color":{"text":"var:preset|color|contrast"}}}}},"textColor":"off-contrast","fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-featured-image {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} /-->

	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group"
		style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">
		<!-- wp:post-date {"format":"M j, Y","style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"accent","textColor":"contrast","fontSize":"small"} /-->

		<!-- wp:post-excerpt {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"x-large"} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"textColor":"off-contrast","layout":{"type":"flex","flexWrap":"nowrap"},"fontSize":"small"} -->
		<div class="wp-block-group has-off-contrast-color has-text-color has-small-font-size">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:avatar {"size":48,"style":{"border":{"radius":"9999px","color":"#ffffff","width":"3px"},"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"margin":{"right":"var:preset|spacing|20"}}}} /-->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Posted by', 'wi-sonx-fse' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:post-author-name /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:wi-sonx-fse/icon {"icon":"CommentsCount","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent"} -->
				<span class="wp-block-wi-sonx-fse-icon has-accent-color has-text-color has-link-color"><svg
						viewBox="0 0 24 24" version="1.1" aria-hidden="true">
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
				<!-- wp:wi-sonx-fse/icon {"icon":"Time","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent"} -->
				<span class="wp-block-wi-sonx-fse-icon has-accent-color has-text-color has-link-color"><svg
						viewBox="0 0 24 24" version="1.1" aria-hidden="true">
						<path
							d="m12 2c5.519 0 10 4.481 10 10s-4.481 10-10 10-10-4.481-10-10 4.481-10 10-10zm0 2c4.415 0 8 3.585 8 8s-3.585 8-8 8-8-3.585-8-8 3.585-8 8-8z"
							fill-rule="evenodd"></path>
						<path
							d="m11.055 13.329.002.004c.036.103.09.202.162.292.097.121.216.213.347.276l.001.001c.131.063.278.098.433.098.115 0 .226-.02.329-.055l.004-.002c.103-.036.202-.09.292-.162l5-4c.431-.345.501-.975.156-1.406s-.975-.501-1.406-.156l-3.375 2.7v-2.919c0-.552-.448-1-1-1s-1 .448-1 1v5c0 .115.02.226.055.329z">
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
		<!-- wp:post-content {"style":{"spacing":{"blockGap":"var:preset|spacing|50"},"typography":{"lineHeight":"1.8"}},"textColor":"contrast-2"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-terms {"term":"category","prefix":"<?php esc_html_e( 'Posted in: ', 'wi-sonx-fse' ); ?>","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"},":hover":{"color":{"text":"var:preset|color|contrast"}}}},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}},"backgroundColor":"base-2","textColor":"contrast-2","fontSize":"small"} /-->
</article>
<!-- /wp:group -->
