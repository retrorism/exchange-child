		<footer class="page__footer" id="footer" role="contentinfo">
			<section class="page__footer__nav">
				<nav role="navigation">
					<?php exchange_footer_links(); ?>
				</nav>
			</section>
			<section class="page__footer__widgets section--coloured">
				<?php echo BasePattern::build_edge_svg('top', exchange_slug_to_hex( 'pink-cl' ) ); ?>
				<?php get_template_part( 'parts/content', 'footer' ); ?>
				<?php echo BasePattern::build_edge_svg('bottom', exchange_slug_to_hex( 'pink-cl' ) ); ?>
			</section>
			<section class="page__footer__copyright">
				<p class="source-org copyright">
					<?php echo bloginfo('name') . __(' is an initiative of MitOst e.V.','exchange'); ?>
					<!-- <a href="https://creativecommons.org/licenses/by-nc/3.0/"
					title="<?php _e('Find out more about this license','exchange'); ?>"
					target="_blank">
					<?php echo __( 'CC BY-NC 3.0','exchange'); ?></a> -->
				<?php $page = get_option('options_imprint_page_link' );
					if ( ! empty( $page ) ) {
						echo ' | ' . exchange_create_link( $page );
					} ?>
				</p>
			</section>
		</footer> <!-- end .footer -->
		<?php wp_footer(); ?>
		<script>
		(function( w ){
		if( w.document.documentElement.className.indexOf( "fonts-loaded" ) > -1 ){
			return;
		}
		var font1 = new w.FontFaceObserver( "Roboto Slab", {
		    weight: 300
		});
		var font2 = new w.FontFaceObserver( "Roboto Slab", {
		    weight: 400,
		});
		var font3 = new w.FontFaceObserver( "Roboto Slab", {
			weight: 700
		});
		var font4 = new w.FontFaceObserver( "Roboto", {
		    weight: 400
		});
		var font5 = new w.FontFaceObserver( "Roboto", {
		    weight: 700
		});
		w.Promise
		    .all([
				font1.check(),
				font2.check(),
				font3.check(),
				font4.check(),
				font5.check(),
			]).then(function(){
		        w.document.documentElement.className += " fonts-loaded";
		    });
		}( this ));
		</script>
	</body>
</html> <!-- end page -->
