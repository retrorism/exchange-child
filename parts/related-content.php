<?php if ( $exchange->has_related_content ) : ?>

	<section class="article-related-content story__footer__section footer__section section--sandbox section--coloured">

		<?php echo BasePattern::build_edge_svg('top', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>

		<div class="section-inner">

		<?php $exchange->publish_related_content( $exchange->type . '__footer'); ?>

		</div><!-- section-inner-->

		<?php echo BasePattern::build_edge_svg('bottom', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>

	</section><!-- related-content -->

<?php endif; ?>