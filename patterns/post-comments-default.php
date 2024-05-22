<?php
/**
 * Title: Default Post Comments
 * Slug: wi-sonx-fse/post-comments-default
 * Categories: theme
 * Inserter: false
 *
 * @package WI\SonxFSE
 */

// Return early if there are no comments and comments are closed.
global $post;
if ( ! $post || ( ! comments_open( $post->ID ) && (int) get_comments_number( $post->ID ) === 0 ) ) {
	return;
}

?>

<!-- wp:group {"layout":{"type":"constrained"},"metadata":{"name":"Comments"}} -->
<div class="wp-block-group">
	<!-- wp:comments -->
	<div class="wp-block-comments">
		<!-- wp:comments-title {"showPostTitle":false,"showCommentsCount":false} /-->

		<!-- wp:comment-template {"style":{"spacing":{"padding":{"left":"var:preset|spacing|50"}}}} -->
		<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|contrast"}}}},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"0","left":"0","right":"var:preset|spacing|50"},"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"base-2","textColor":"contrast-2","className":"wi-comment","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
		<div class="wp-block-group wi-comment has-contrast-2-color has-base-2-background-color has-text-color has-background has-link-color"
			style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50);padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:0;padding-left:0">
			<!-- wp:avatar {"size":130,"style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} /-->

			<!-- wp:group {"style":{"layout":{"selfStretch":"fill","flexSize":null},"spacing":{"blockGap":"var:preset|spacing|50","padding":{"top":"var:preset|spacing|40"}}},"className":"wi-comment-inner","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
			<div class="wp-block-group wi-comment-inner" style="padding-top:var(--wp--preset--spacing--40)">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"className":"wi-comment-meta","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"bottom"}} -->
				<div class="wp-block-group wi-comment-meta">
					<!-- wp:comment-author-name {"isLink":false,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"contrast","fontSize":"large"} /-->

					<!-- wp:comment-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent","fontSize":"small"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:comment-content {"fontSize":"small"} /-->

				<!-- wp:group {"style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
				<div class="wp-block-group">
					<!-- wp:comment-edit-link {"style":{"typography":{"textTransform":"uppercase"}},"backgroundColor":"accent","fontSize":"small"} /-->

					<!-- wp:comment-reply-link {"style":{"typography":{"textTransform":"uppercase"}},"backgroundColor":"accent","fontSize":"small"} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
		<!-- /wp:comment-template -->

		<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50)">
			<!-- wp:comments-pagination {"paginationArrow":"chevron","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast","layout":{"type":"flex","justifyContent":"space-between"}} -->
			<!-- wp:comments-pagination-previous /-->

			<!-- wp:comments-pagination-next /-->
			<!-- /wp:comments-pagination -->
		</div>
		<!-- /wp:group -->

		<!-- wp:post-comments-form {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast-2"} /-->
	</div>
	<!-- /wp:comments -->
</div>
<!-- /wp:group -->
