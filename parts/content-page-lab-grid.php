<section class="section--has_grid section--coloured section--sandbox section--lab_grid">
	
	<?php echo BasePattern::build_edge_svg('top', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>
			
			<div class="sectionheader lab_grid__sectionheader">
				<div class="sectionheader-inner">
					<h4 class="sectionheader__text--default"><span><?php _e( 'Latest prototypes and resources','exchange' ); ?></span></h4>
				</div>
			</div>


			<div class="featuredgrid__masonry">
					
				<div class="masonry__grid-sizer"></div>
				<div class="masonry__gutter-sizer"></div>
				<?php $griditems = exchange_cl_create_lab_griditems( $post->post_name );

				foreach( $griditems as $griditem ) {
					$griditem->publish();
				} ?>
				
			</div>
	
	<?php echo BasePattern::build_edge_svg('bottom', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>

</section>