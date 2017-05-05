<header class="article-header archive__header">

	<div class="archive__header__introduction">

		<div class="archive__title-wrapper">

		<?php if ( is_post_type_archive( 'story' ) || is_post_type_archive( 'participant' ) ) : ?>

			<h1 class="archive__title" itemprop="headline"><?php the_archive_title() ?></h1>

			<?php 
				global $wp_query;
				$type = $wp_query->query['post_type'];
				if ( ! empty( $type ) ) : ?>

					<div class="editorialintro story__editorialintro" itemprop="headline">
						<div class="paragraph editorialintro__paragraph">
						<p><?php echo get_option( 'options_' . $type . '_archive_page_introduction' ); ?></p>
						</div>
					</div>

			<?php endif; ?>
				
		<?php elseif ( is_tax() || get_query_var( 'programme-round' ) ) : ?>

			<h1 class="archive__title" itemprop="headline"><?php the_archive_title() ?></h1>

			<?php the_archive_description( '<div class="taxonomy-description">', '</div>' );?>

		<?php elseif ( is_search() ) : ?>

			<h1 class="archive__title"><?php echo esc_html( __( 'Search Results for: ', 'exchange' ) . esc_attr( get_search_query() ) ); ?></h1>

		<?php endif; ?>

		</div>

	</div>

</header>
