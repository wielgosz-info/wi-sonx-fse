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

$wi_sonx_fse_skills = array(
	70,
	59,
	92,
	69,
	89,
);
?>

<!-- wp:wi-sonx-fse/front-page-section {"lock":{"move":true,"remove":true}} -->
<section
	class="wp-block-wi-sonx-fse-front-page-section alignfull has-contrast-color has-base-background-color has-text-color has-background"
	id="about" data-wp-interactive="wi-sonx-fse/front-page-section" data-wp-init="wi-sonx-fse/front-page-toc::callbacks.register">
	<div class="wp-block-wi-sonx-fse-front-page-section__content">
		<!-- wp:group {"templateLock":"all","lock":{"move":true,"remove":true},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","flexWrap":"nowrap"}} -->
		<div class="wp-block-group"
			style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"fontSize":"xx-large"} -->
					<h2 class="wp-block-heading has-xx-large-font-size">
						<?php esc_html_e( 'About', 'wi-sonx-fse' ); ?>
					</h2>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"textColor":"contrast-2","fontSize":"medium"} -->
				<div class="wp-block-column has-contrast-2-color has-text-color has-medium-font-size">
					<!-- wp:paragraph -->
					<p>Tristique fames sed aliquet ultricies eget
						viverra arcu vitae dipiscing polomius consequat maecenas turpis metus sit dac quam nunc amet
						tristique.</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph -->
					<p>Purus leo in varius ac quam nunc amet tristique volutpat a dipiscing polomius consequa.</p>
					<!-- /wp:paragraph -->

					<!-- wp:image {"width":"auto","height":"64px","sizeSlug":"full","linkDestination":"none"} -->
					<figure class="wp-block-image size-full is-resized"><img
							src="<?php echo esc_url( get_theme_file_uri( 'assets/images/front-page__signature.svg' ) ); ?>"
							alt="<?php esc_html_e( 'Signature', 'wi-sonx-fse' ); ?>" style="width:auto;height:64px" />
					</figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
			<div class="wp-block-columns">
				<?php
				foreach ( $wi_sonx_fse_skills as $wi_sonx_fse_idx => $wi_sonx_fse_skill ) :
					?>
					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:wi-sonx-fse/skill-percentage {"percentage":<?php echo esc_attr( $wi_sonx_fse_skill ); ?>,"animation":{"duration":2000,"delay":<?php echo esc_attr( ( $wi_sonx_fse_idx + 1 ) * 200 ); ?>}} -->
						<figure id="<?php echo esc_attr( sprintf( 'skill-%s', $wi_sonx_fse_idx + 1 ) ); ?>" class="wp-block-wi-sonx-fse-skill-percentage" data-wp-interactive="wi-sonx-fse/skill-percentage"
							<?php
							echo wp_interactivity_data_wp_context(
								array(
									'percentage'        => $wi_sonx_fse_skill,
									'percentageCounter' => 0,
									'animation'         => array(
										'duration' => 2000,
										'delay'    => ( $wi_sonx_fse_idx + 1 ) * 200,
									),
								)
							);
							?>
							data-wp-run="callbacks.runCounter"
							data-wp-init--in-view="callbacks.initInView"
							data-wp-init--reduced-motion="callbacks.initReducedMotion"
							data-wp-watch--in-view="callbacks.watchInView"
						>
							<canvas id="<?php echo esc_attr( sprintf( 'skill-%s-canvas', $wi_sonx_fse_idx + 1 ) ); ?>"
								class="wp-block-wi-sonx-fse-skill-percentage__canvas"
								data-wp-init="callbacks.initChart"></canvas>
							<div class="wp-block-wi-sonx-fse-skill-percentage__percentage"><span
									class="wp-block-wi-sonx-fse-skill-percentage__value"
									data-wp-text="context.percentageCounter">
									<?php echo esc_html( $wi_sonx_fse_skill ); ?>
								</span><span class="wp-block-wi-sonx-fse-skill-percentage__suffix">%</span>
							</div>
							<figcaption class="wp-element-caption wp-block-wi-sonx-fse-skill-percentage__caption">
								<?php esc_html_e( 'Skill', 'wi-sonx-fse' ); ?>
								<?php echo esc_html( $wi_sonx_fse_idx + 1 ); ?>
							</figcaption>
						</figure>
						<!-- /wp:wi-sonx-fse/skill-percentage -->
					</div>
					<!-- /wp:column -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->
	</div>
</section>
<!-- /wp:wi-sonx-fse/front-page-section -->
