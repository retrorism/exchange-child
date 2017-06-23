<div class="story__contactblock">
	<div class="storyteller__main-inner--image">

		<?php if ( ! empty( $user_image ) ) : ?>
				
				<?php $user_image->publish('storyteller-card'); ?>

		 <?php else : ?>

		 	<img src="<?php echo esc_url( exchange_cl_get_random_bubble_image() ); ?>" alt="<?php _e( 'This CitizensLab Member does not have a profile image yet','exchange' ); ?>" width="200" height="auto" />

	 	<?php endif; ?>

	 </div>

		<div class="storyteller__main-inner--info">

		<header class="article-header storyteller__header">

			<div class="storyteller__title-wrapper">

				<h4 class="entry-title storyteller__title" itemprop="headline"><?php echo esc_html( $user_info['display_name'] ); ?><span class="storyteller__title__type"></h4>

			</div>

		</header> <!-- end .story__header -->

		<?php include( get_stylesheet_directory() . '/parts/content-contactblock-details.php' ); ?>
		
		<div class='storyteller__read-full-story'>
			<?php echo exchange_cl_create_link( $exchange, true, '' ); ?>
		</div>
	</div>
</div>