<section class="archive__grid section--has-grid section--archive-grid">
	<div class="section-inner">

		<div class="archive__grid__masonry">
			
			<div class="masonry__grid-sizer"></div>
			<div class="masonry__gutter-sizer"></div>
			
			<?php if ( ! function_exists( 'facetwp_display' ) ) : ?>
				
				<?php while (have_posts()) : the_post(); ?>

					<?php include( get_stylesheet_directory() . '/parts/loop-archive-grid.php' ); ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php echo facetwp_display( 'template', 'participants_filtered' ); ?>

			<?php endif; ?>
			
		</div><!-- end archive__grid__masonry -->

	</div>
</section>
