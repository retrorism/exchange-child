<?php 
 /**
 * Story footer content part
 * Author: Willem Prins | SOMTIJDS
 * Project: CitizensLab
 * Date created: 26/04/2017
 *
 * @package Exchange Child Theme II: Citizenslab
 **/

 	global $post;

	if ( ! empty( $post->post_parent ) ) : ?>

	<?php $labs_page = get_page_by_title( 'Labs' );

		if ( $labs_page instanceof WP_Post && $post->post_parent === $labs_page->ID ) : ?>
			
			<?php include_once( get_stylesheet_directory() . '/parts/content-page-lab-grid.php' ); ?>

		<?php endif; ?>

	<?php endif; ?>

	<footer class="article-footer story__footer">
	
	<?php if ( $labs_page instanceof WP_Post && $post->post_parent === $labs_page->ID ) : ?>

		<?php include_once( get_stylesheet_directory() . '/parts/content-lab-prototype-pointer.php' ); ?>

	<?php else : ?>

		<?php include_once( get_stylesheet_directory() . '/parts/content-sharing-footer.php' ); ?>

	<?php endif; ?>

	</footer> <!-- end article footer -->

