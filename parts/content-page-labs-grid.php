<section class="section--has_grid section--coloured section--sandbox section--labs_grid">
	
	<?php echo BasePattern::build_edge_svg('top', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>

	<div class="section-inner">

		<div class="featuredgrid__masonry">
				
			<div class="masonry__grid-sizer"></div>
			<div class="masonry__gutter-sizer"></div>
			
			<?php for ( $i = 0; $i < count( $lab_circle ); $i++ ) {
					$lab_circle[$i]['griditem']->publish();
				};
				$why_page = get_page_by_title( 'Why CitizensLab?' );
				$item = exchange_cl_create_griditem_from_post( $why_page, 'featuredgrid' );
				if ( $item ) {
					$item->publish();
				}
			?>
			
		</div>

	</div>

	<?php echo BasePattern::build_edge_svg('bottom', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>

</section>
