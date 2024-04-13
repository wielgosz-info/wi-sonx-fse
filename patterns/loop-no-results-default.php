<?php
/**
 * Title: Default No Results Section
 * Slug: wi-sonx-fse/loop-no-results-default
 * Categories: posts
 * Inserter: false
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:pullquote -->
	<figure class="wp-block-pullquote">
		<blockquote>
			<p>
				<?php esc_html_e( 'There is no such thing as failure. There are only results.', 'wi-sonx-fse' ); ?>
			</p>
			<cite>Tony Robbins</cite>
		</blockquote>
	</figure>
	<!-- /wp:pullquote -->

	<!-- wp:paragraph {"align":"right","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
	<p class="has-text-align-right" style="margin-bottom:var(--wp--preset--spacing--40)">
		...or no results, as case may be. Try again? </p>
	<!-- /wp:paragraph -->

	<!-- wp:search {"label":"Search","buttonText":"Search","align":"center"} /-->

	<!-- wp:group {"layout":{"type":"constrained"}} -->
	<div class="wp-block-group"><!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}}} -->
		<p style="margin-top:var(--wp--preset--spacing--60)">
			Looking for a specific topic? </p>
		<!-- /wp:paragraph -->

		<!-- wp:tag-cloud /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
