<div class="story__meta-wrapper">

	<aside class="article-meta story__meta">

		<div class="story__meta-inner">
			
			<section class="story__meta__item story__meta__item--date">

				<?php echo esc_html( mysql2date('F jS, Y', $exchange->date ) ); ?>

			</section>

			<?php if ( ! empty( $exchange->category ) ) : ?>

				<section class="story__meta__item story__meta__item--category">
					<?php $exchange->publish_category(); ?>
				</section>

			<?php endif; ?>

			<?php if ( ! empty( $exchange->storyteller ) ) : ?>

				<section class="story__meta__item story__meta__item--storyteller">

					<?php echo esc_html( sprintf( __("Shared by: %s", 'exchange' ), $exchange->storyteller->title ) ); ?>

				</section>

			<?php endif; ?>



			<?php if ( $exchange->has_tags ) : ?>

				<section class="story__meta__item story__meta__item--tags">

					<?php $exchange->publish_tags('story__meta'); ?>

				</section>

			<?php endif; ?>

			<section class="story__meta__item story__meta__item--sharing-buttons">

				<small class="story__meta__item__header"><?php _e( 'Share this story', EXCHANGE_PLUGIN ); ?></small>

				<?php echo exchange_cl_build_social_icons( 'story__meta', array('facebook','twitter','email'), $exchange ); ?>

			</section>

		</div>

	</aside>

</div>
