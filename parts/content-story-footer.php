<footer class="article-footer story__footer">
	
	<?php 
		global $post;
		if ( ! empty( $post->post_parent ) ) : ?>

		<?php $labs_page = get_page_by_title( 'Labs' );
			if ( $labs_page instanceof WP_Post && $post->post_parent === $labs_page->ID ) : ?>
				
				<?php get_template_part( 'parts/content', 'page-lab' ); ?>

			<?php endif; ?>

	<?php else : ?>

		<?php include_once( get_stylesheet_directory() . '/parts/content-sharing-footer.php' ); ?>

	<?php endif; ?>

</footer> <!-- end article footer -->
