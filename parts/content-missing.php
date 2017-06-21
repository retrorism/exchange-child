<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/Article">

	<div class="entry-content story__content">

	<?php if ( is_search() ) : ?>

		<section class="story__section">
			<div class="section-inner">

				<div class="section__slice paragraph">
					<p><strong><?php _e( 'Oh no!', 'exchange' ); ?></strong><br />
					<?php $home_link = '<a href="' . get_home_url() . '" target="_parent">here</a>'; ?>
					<?php echo wp_sprintf( __('We did not find anything that matches your request. Try editing your keyword below, or click %s to return to the homepage.', 'exchange' ), $home_link ); ?></p>
				</div>

				<div class="section__slice">
					<p><?php get_search_form(); ?></p>
				</div>
			</div>
		</section>

	<?php else: ?>

		<section class="story__section">
			
			<div class="section-inner">

				<div class="section__slice paragraph">
					<p><strong><?php _e( 'Oh no!', 'exchange' ); ?></strong><br />
					<?php $home_link = '<a href="' . get_home_url() . '" target="_parent">here</a>'; ?>
					<?php echo wp_sprintf( __('We did not find anything that matches your request. Click %s to return to the homepage, or use the search function below.', 'exchange' ), $home_link ); ?></p>
				</div>

				<div class="section__slice">
					<p><?php get_search_form(); ?></p>
				</div>
			</div>
			
		</section>

	<?php endif; ?>

	</div> <!-- end article section -->

</article> <!-- end article -->