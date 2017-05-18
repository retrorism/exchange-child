<div class="featuredgrid__masonry">
		
	<div class="masonry__grid-sizer"></div>
	<div class="masonry__gutter-sizer"></div>
	<?php $griditems = exchange_cl_create_lab_griditems( $post->post_name );

	foreach( $griditems as $griditem ) {
		$griditem->publish();
	} ?>
	
</div>