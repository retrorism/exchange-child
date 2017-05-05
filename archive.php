<?php
/*
 * Template name: Archive
 */

get_header(); ?>

<main id="main" class="archive-wrapper" role="main" data-toggler=".facets-active">

	<div class="main-inner">

		<?php get_template_part( 'parts/content', 'archive-header'); ?>

		<section class="section--has_grid section--sandbox section--coloured">
		<?php echo BasePattern::build_edge_svg( 'top', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>

			<div class="archive__interface">

				<div class="archive__interface-inner">

				<?php if ( have_posts() ) : ?>

					<?php get_template_part( 'parts/content', 'archive-grid' ); ?>
					<?php exchange_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>

				</div><!-- end .archive__interface-inner -->

			</div><!-- end .archive__interface-->

		<?php echo BasePattern::build_edge_svg( 'bottom', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>
		</section>

		<footer class="archive__footer">

			<section class="archive__footer__section footer__section">

				<div class="section-inner">

					<?php get_template_part( 'parts/content','get-involved-cta' ); ?>

				</div>

			</section>

		</footer>

	</div><!-- end main-inner -->

</main> <!-- end #main -->

<?php get_footer(); ?>
