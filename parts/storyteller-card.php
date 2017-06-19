<div class="storyteller__main-inner--image">

	<?php if ( $exchange->has_featured_image ) : ?>
		
		<?php $exchange->publish_featured_image('storyteller-card'); ?>

	 <?php else : ?>

	 	<img src="<?php echo esc_url( exchange_cl_get_random_bubble_image() ); ?>" alt="<?php _e( 'This CitizensLab Member does not have a profile image yet','exchange' ); ?>" width="200" height="auto" />

 	<?php endif; ?>

 </div>

	<div class="storyteller__main-inner--info">

	<header class="article-header storyteller__header">

		<div class="storyteller__title-wrapper">
			<?php
				$p_type = ''; 
				if ( current_theme_supports( 'exchange_participant_types' ) && ! empty( $exchange->participant_type ) ) { 
					$p_type = $exchange->participant_type->name; 
				}; ?>
			<h4 class="entry-title storyteller__title" itemprop="headline"><?php echo esc_html( $exchange->name ); ?><span class="storyteller__title__type"><?php echo ' | ' . esc_html( $p_type ); ?></span></h4>

		</div>

	</header> <!-- end .story__header -->

	<?php include( get_stylesheet_directory() . '/parts/content-storyteller-details.php' ); ?>
	
	<div class='storyteller__read-full-story'>
		<?php echo exchange_cl_create_link( $exchange, true, '' ); ?>
	</div>
</div>