<?php

	$featured_stories = get_post_meta( $exchange->post_id, 'featured_stories', true );
	$modifiers = array(
		'grid_width' => 'grid_third',
		'grid_width_num' => 4,
	);

	if ( ! empty( $featured_stories ) ) : ?>

		<div class="featured-stories featured-stories<?php echo esc_attr( $three_plus ); ?>">

			<section class="section--has-grid section--featured-grid">

				<div class="section-inner">

					<div class="row">

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

				</div><!-- section-inner-->

			</section><!-- section--has-grid-->

		</div>

	<?php endif; ?>
