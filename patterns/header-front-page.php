<?php
/**
 * Title: Header on Front Page
 * Slug: wi-sonx-fse/header-front-page
 * Categories: header
 *
 * @package WI\SonxFSE
 */

?>

<!-- wp:group {"className":"wi-front-page-header__menu"} -->
<div class="wp-block-group wi-front-page-header__menu">
	<!-- wp:site-logo {"width":60,"isLink":false,"shouldSyncIcon":true} /-->

	<!-- wp:wi-sonx-fse/front-page-toc -->
	<nav class="wp-block-wi-sonx-fse-front-page-toc"
		aria-label="<?php esc_attr_e( 'Table of contents', 'wi-sonx-fse' ); ?>"
		data-wp-interactive="wi-sonx-fse/front-page-toc" data-wp-watch="callbacks.watch"><button
			class="wp-block-wi-sonx-fse-front-page-toc__button"
			aria-label="<?php esc_attr_e( 'Open table of contents', 'wi-sonx-fse' ); ?>"
			aria-controls="wp-block-wi-sonx-fse-front-page-toc__list" aria-expanded="false"
			data-wp-on--click="actions.open" data-wp-bind--aria-expanded="state.isOpen"><svg viewBox="0 0 31 18"
				aria-hidden="true" version="1.1">
				<path d="m6 0h24v.75h-24z"></path>
				<path d="m6 16.5h24v.75h-24z"></path>
				<path d="m0 8.25h24v.75h-24z"></path>
			</svg></button>
		<ol class="wp-block-wi-sonx-fse-front-page-toc__list" id="wp-block-wi-sonx-fse-front-page-toc__list"
			data-wp-bind--hidden="!state.isOpen"><template data-wp-each="state.sections"
				data-wp-each-key="context.item.anchor">
				<li class="wp-block-wi-sonx-fse-front-page-toc__item"><a
						class="wp-block-wi-sonx-fse-front-page-toc__link" data-wp-bind--href="state.href"><span
							class="wp-block-wi-sonx-fse-front-page-toc__label"
							data-wp-text="context.item.title"></span></a></li>
			</template></ol>
	</nav>
	<!-- /wp:wi-sonx-fse/front-page-toc -->

	<!-- wp:wielgosz-info/wi-collapsible-social-links {"size":"has-large-icon-size","backgroundColor":"base-2","textColor":"contrast"} -->
	<div class="wp-block-wielgosz-info-wi-collapsible-social-links is-horizontal-at-medium has-large-icon-size has-contrast-color has-base-2-background-color has-text-color has-background"
		id="social-links" data-wp-interactive="WICollapsibleSocialLinks"
		data-wp-context="{ &quot;isOpen&quot;: false }"><button
			class="wp-block-wielgosz-info-wi-collapsible-social-links__button" data-wp-on--click="actions.toggle"
			data-wp-bind--aria-expanded="context.isOpen" aria-controls="social-links-content"><svg width="24"
				height="24" viewBox="0 0 24 24" version="1.1" aria-hidden="true">
				<path
					d="m10.18 8.425c-.731.957-1.884 1.575-3.18 1.575-2.208 0-4-1.792-4-4s1.792-4 4-4 4 1.792 4 4c0 .378-.052.743-.151 1.09.022.008.043.018.064.028l4.844 2.422c.022.011.043.023.063.035.731-.957 1.884-1.575 3.18-1.575 2.208 0 4 1.792 4 4s-1.792 4-4 4c-1.296 0-2.449-.618-3.18-1.575-.02.012-.041.024-.063.035l-4.844 2.422c-.021.01-.042.02-.064.028.099.347.151.712.151 1.09 0 2.208-1.792 4-4 4s-4-1.792-4-4 1.792-4 4-4c1.296 0 2.449.618 3.18 1.575.02-.012.041-.024.063-.035l4.844-2.422c.021-.01.042-.02.064-.028-.099-.347-.151-.712-.151-1.09s.052-.743.151-1.09c-.022-.008-.043-.018-.064-.028l-4.844-2.422c-.022-.011-.043-.023-.063-.035zm-3.18 7.075c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5 1.12-2.5 2.5-2.5zm12-6c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5 1.12-2.5 2.5-2.5zm-12-6c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5 1.12-2.5 2.5-2.5z"
					fill-rule="evenodd"></path>
			</svg><span class="wp-block-wielgosz-info-wi-collapsible-social-links__button-label screen-reader-text"><?php esc_html_e( 'Social Links', 'wi-sonx-fse' ); ?></span></button>
		<nav class="wp-block-wielgosz-info-wi-collapsible-social-links__content" id="social-links-content"
			data-wp-bind--hidden="!context.isOpen">
			<!-- wp:social-links {"size":"has-large-icon-size","lock":{"move":false,"remove":false},"style":{"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<ul class="wp-block-social-links has-large-icon-size"
				style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0">
				<!-- wp:social-link {"url":"#","service":"github"} /-->

				<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
			</ul>
			<!-- /wp:social-links -->
		</nav>
	</div>
	<!-- /wp:wielgosz-info/wi-collapsible-social-links -->
</div>
<!-- /wp:group -->
