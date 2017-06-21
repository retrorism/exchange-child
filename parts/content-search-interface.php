<div class="archive__interface">
		
	<?php if ( function_exists( 'facetwp_display' ) ) : ?>
		<?php echo facetwp_display( 'facet', 'archive_filtered' ); ?>
	<?php endif; ?>

	<section class="archive__grid section--has-grid section--archive-grid">
		<div class="section-inner">

			<div class="archive__grid__masonry">
				
				<div class="masonry__grid-sizer"></div>
				<div class="masonry__gutter-sizer"></div>

				<?php if ( have_posts() ) : ?>
				
					<?php while (have_posts()) : the_post(); ?>

						<?php include( get_stylesheet_directory() . '/parts/loop-archive-grid.php' ); ?>

					<?php endwhile; ?>

				<?php else : ?>
					
					<?php include ( get_stylesheet_directory() . '/parts/content-missing.php' ); ?>
				
				<?php endif; ?>
				
			</div>

		</div>
	</section>

</div><!--archive__interface-->