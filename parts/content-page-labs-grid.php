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