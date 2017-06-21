<?php
/*
 * Template name: Archive
 */

get_header(); ?>

<main id="main" class="archive-wrapper" role="main" data-toggler=".facets-active">

	<div class="main-inner">

		<?php get_template_part( 'parts/content', 'archive-header'); ?>

		<section class="section--has_grid section--sandbox section--coloured">
		<?php /* echo BasePattern::build_edge_svg( 'top', exchange_slug_to_hex( 'sandbox-cl' ) ); */ ?>
			
			<?php get_template_part( 'parts/content', 'archive-interface' ); ?>

		<?php /* echo BasePattern::build_edge_svg( 'bottom', exchange_slug_to_hex( 'sandbox-cl' ) ); */ ?>
		</section>

	</div><!-- end main-inner -->

</main> <!-- end #main -->

<footer class="archive__footer section--white section--coloured">
	
	<?php echo BasePattern::build_edge_svg( 'top', exchange_slug_to_hex( 'white' ) ); ?>

	<section class="archive__footer__section footer__section">

		<div class="section-inner">

			<?php get_template_part( 'parts/content','get-involved-cta' ); ?>

		</div>

	</section>

</footer>

<?php get_footer(); ?>

