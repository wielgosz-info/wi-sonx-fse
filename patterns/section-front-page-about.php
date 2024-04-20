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

$skills = array(
	70,
	59,
	92,
	69,
	89,
);
?>

<!-- wp:wi-sonx-fse/front-page-section {"anchor":"about","lock":{"move":true,"remove":true}} -->
<section
	class="wp-block-wi-sonx-fse-front-page-section alignfull has-contrast-color has-base-background-color has-text-color has-background"
	id="about" data-wi-toc="true">
	<div class="wp-block-wi-sonx-fse-front-page-section-content">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"stretch","flexWrap":"nowrap"}} -->
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

				<!-- wp:column {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"spacing":{"blockGap":"var:preset|spacing|50"}},"textColor":"off-contrast","fontSize":"medium"} -->
				<div class="wp-block-column has-off-contrast-color has-text-color has-link-color has-medium-font-size">
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
				<?php foreach ( $skills as $idx => $skill ) : ?>
					<!-- wp:column -->
					<div class="wp-block-column">
						<?php // phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped  ?>
						<!-- wp:wi-sonx-fse/skill-percentage {"percentage":<?php echo $skill; ?>,"animation":{"duration":2000,"delay":<?php echo ( $idx + 1 ) * 200; ?>}} -->
						<figure id="skill-<?php echo $idx + 1; ?>" class="wp-block-wi-sonx-fse-skill-percentage" data-wp-interactive="wi-sonx-fse/skill-percentage"
							<?php
							echo wp_interactivity_data_wp_context(
								array(
									'percentage'        => $skill,
									'percentageCounter' => 0,
									'animation'         => array(
										'duration' => 2000,
										'delay'    => ( $idx + 1 ) * 200,
									),
								)
							);
							?>
							data-wp-run="callbacks.runCounter"
							data-wp-init--in-view="callbacks.initInView"
							data-wp-init--reduced-motion="callbacks.initReducedMotion"
							data-wp-watch--in-view="callbacks.watchInView"
						>
							<canvas id="skill-<?php echo $idx + 1; ?>-canvas"
								class="wp-block-wi-sonx-fse-skill-percentage-canvas"
								data-wp-init="callbacks.initChart"></canvas>
							<div class="wp-block-wi-sonx-fse-skill-percentage-percentage"><span
									class="wp-block-wi-sonx-fse-skill-percentage-value"
									data-wp-text="context.percentageCounter">
									<?php echo $skill; ?>
								</span><span class="wp-block-wi-sonx-fse-skill-percentage-suffix">%</span>
							</div>
							<figcaption class="wp-element-caption wp-block-wi-sonx-fse-skill-percentage-caption">
								<?php esc_html_e( 'Skill', 'wi-sonx-fse' ); ?>
								<?php echo $idx + 1; ?>
							</figcaption>
						</figure>
						<!-- /wp:wi-sonx-fse/skill-percentage -->
						<?php // phpcs:enable  ?>
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
