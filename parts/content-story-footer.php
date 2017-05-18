<footer class="article-footer story__footer">

	<?php if ( is_singular('story') && ! empty( $exchange->byline ) ) : ?>

		<section class="article-byline story__footer__section footer__section section--byline">

			<div class="section-inner">

		<?php $exchange->publish_byline( 'story__footer' ); ?>

			</div><!-- section-inner-->

		</section>

	<?php endif; ?>


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


	<?php if ( $exchange->has_related_content ) : ?>

		<section class="article-related-content story__footer__section footer__section section--sandbox section--coloured">

			<?php echo BasePattern::build_edge_svg('top', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>

			<div class="section-inner">

			<?php $exchange->publish_related_content( $exchange->type . '__footer'); ?>

			</div><!-- section-inner-->

			<?php echo BasePattern::build_edge_svg('bottom', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>

		</section><!-- related-content -->

	<?php endif; ?>

</footer> <!-- end article footer -->
