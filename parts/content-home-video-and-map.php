<?php
/**
 * Footer Content Template
 * Author: Willem Prins | SOMTIJDS
 * Project: Tandem
 * Date created: 24/05/2016
 *
 * @package Exchange Plugin
 **/
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

?>
<section class="home__section home__section--video">

	<div class="section-inner">

		<div class="video-wrapper" style="background: white; height: 708px;">
			<div class="section__sectionheader">
				<h4>CitizensLab Video</h4>
			</div>
		</div>

	</div><!-- end section-inner -->

</section>

<section class="home__section home__section--video">

	<div class="section-inner">

		<?php $map_input = array(
				'map_style' => 'network',
				'map_size' => 'full',
				'map_zoom_level' => '4',
			);
			$map = BasePattern::pattern_factory( $map_input, 'simple_map', 'archive__map', true );
			$map->publish();

		?>

	</div><!-- end section-inner -->

</section>