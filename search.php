<?php get_header(); ?>

<main id="main" role="main" data-scroll="main">

	<div class="main-inner">

		<?php get_template_part( 'parts/content', 'archive-header'); ?>

		<section class="section--has_grid section--sandbox section--coloured">
		<?php /* echo BasePattern::build_edge_svg( 'top', exchange_slug_to_hex( 'sandbox-cl' ) ); */ ?>
			
			<?php get_template_part( 'parts/content', 'search-interface' ); ?>

		<?php /* echo BasePattern::build_edge_svg( 'bottom', exchange_slug_to_hex( 'sandbox-cl' ) ); */ ?>
		</section>

	</div>

</main> <!-- end #main -->

<?php get_footer(); ?>
