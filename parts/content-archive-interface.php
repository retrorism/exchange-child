<div class="archive__interface">		
		
	<?php get_template_part( 'parts/content', 'archive-grid' ); ?>
	
	<?php if ( is_post_type_archive( 'participant' ) ) : ?>
						
		<?php get_template_part( 'parts/content', 'archive-map'); ?>
			
	<?php endif; ?>

</div><!--archive__interface-->