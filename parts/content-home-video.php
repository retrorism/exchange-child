<?php
/**
 * Homepage Video Content Template
 * Author: Willem Prins | SOMTIJDS
 * Project: CitizensLab
 * Date created: 04/05/2017
 *
 * @package Exchange Child Theme II: Citizenslab
 **/
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

?>
<?php if ( function_exists( 'get_fields' ) && class_exists( 'BasePattern' ) ) : ?>

<?php 
	$cl_meta = get_fields( $exchange->post_id );
	if ( ! empty( $cl_meta['cl_homepage_video'] ) ) : ?>
			<section class="story__section">
				<div class="section-inner">

					<div class="section__slice--video">

						<?php $video = BasePattern::pattern_factory( array( 'video_embed_code' => $cl_meta['cl_homepage_video'] ), 'embedded_video', 'homepage', true );
							$video->publish(); ?>

					</div>

					<div class="section__slice section__slice--home">

					<?php if ( ! empty( $cl_meta['cl_homepage_video_header'] ) ) : ?>
						<div class="sectionheader sectionheader--grid_header">
							<div class="sectionheader-inner">
								<h4 class="sectionheader__text--default">
									<?php echo esc_html( $cl_meta['cl_homepage_video_header'] ); ?>
								</h4>
							</div>
						</div>

					<?php endif; ?>

					<?php if ( ! empty( $cl_meta['cl_homepage_video_description'] ) ) : ?>

						<?php echo $cl_meta['cl_homepage_video_description']; ?>

					<?php endif; ?>

				</div>


				</div><!-- end section-inner -->
			</section>

	<?php endif; ?>
<?php endif; ?>	