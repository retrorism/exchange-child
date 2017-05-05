<?php

	$featured_stories = get_post_meta( $exchange->post_id, 'featured_stories', true );
	$modifiers = array(
		'grid_width' => 'grid_third',
		'grid_width_num' => 4,
	);

	if ( ! empty( $featured_stories ) ) : ?>

		<section class="section--has_grid">

			<div class="section-inner">

				<div class="featuredgrid__masonry">
					
					<div class="masonry__grid-sizer"></div>
					<div class="masonry__gutter-sizer"></div>

					<?php foreach( $featured_stories as $featured_story ) : ?>
					
						<?php
							$item = BaseController::exchange_factory( $featured_story,'griditem' );
							if ( ! $item instanceof Exchange ) {
								continue;
							}
						    $griditem = new Griditem( $item, 'featuredgrid', $modifiers );
						    if ( ! $griditem instanceof Griditem ) {
						    	continue;
						    }
							$griditem->publish(); 
						?>
					
					<?php endforeach; ?>

				</div>

			</div><!-- section-inner-->

		</section><!-- section--has-grid-->

	<?php endif; ?>
