<?php get_header(); ?>

	<main id="main" role="main" data-scroll="main">

		<div class="main-inner">

			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/Article">

				<header class="story__header">
					<div class="story__header__introduction">
						<div class="story__title-wrapper">
							<h1><?php _e( '404 - Article Not Found', 'exchange' ); ?></h1>
						</div>
					</div>
				</header> <!-- end article header -->

				<div class="entry-content story__content">

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

				</div> <!-- end article section -->

			</article> <!-- end article -->

		</div> <!-- end main-inner -->

	</main> <!-- end #main -->

<?php get_footer(); ?>
