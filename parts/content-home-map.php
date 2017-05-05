<?php
/**
 * Homepage Map Content Template
 * Author: Willem Prins | SOMTIJDS
 * Project: Tandem
 * Date created: 04/05/2017
 *
 * @package Exchange Child Theme II: Citizenslab
 **/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

?>

<section class="story__section">

	<div class="section-inner">

		<?php $map_input = array(
				'map_style' => 'network',
				'map_size' => 'full',
				'map_zoom_level' => '4',
				'map_collaborations' => array(),
				'map_caption' => '',
			);
			$map = BasePattern::pattern_factory( $map_input, 'simple_map', 'archive__map', true );
			$map->publish();

		?>

		<div class="section__slice section__slice--home">

			<?php if ( ! empty( $cl_meta['cl_homepage_map_header'] ) ) : ?>
			
				<div class="sectionheader sectionheader--grid_header">
					<div class="sectionheader-inner">
						<h4 class="sectionheader__text--default">
							<?php echo esc_html( $cl_meta['cl_homepage_map_header'] ); ?>
						</h4>
					</div>
				</div>

			<?php endif; ?>

			<?php if ( ! empty( $cl_meta['cl_homepage_map_description'] ) ) : ?>

				<?php echo $cl_meta['cl_homepage_map_description']; ?>

			<?php endif; ?>

			<div>
				<a class="read-full-story" href="<?php echo get_post_type_archive_link( 'participant' ); ?>" title="Navigate to the People page"><?php _e( 'Go to map', 'exchange' ); ?></a>
			</div>

		</div>

		</div>


		

	</div><!-- end section-inner -->

</section>