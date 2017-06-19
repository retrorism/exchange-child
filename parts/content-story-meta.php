<div class="story__meta-wrapper">

	<aside class="article-meta story__meta">

		<div class="story__meta-inner">
			

			<?php if ( ! empty( $exchange->storyteller ) ) : ?>

				<section class="story__meta__item story__meta__item--storytellers">

				<?php foreach ( $exchange->storyteller as $s ) : ?>

					<div class="story__meta__item--storyteller">
						<?php if ( $s->has_featured_image ) : ?>
							
							<?php $s->publish_featured_image('story__meta'); ?>
						
						<?php else : ?>
					 	
					 	<img src="<?php echo esc_url( exchange_cl_get_random_bubble_image() ); ?>" alt="<?php _e( 'This CitizensLab Member does not have a profile image yet','exchange' ); ?>" width="40" height="auto" />

				 		<?php endif; ?>

				 		<div class="storyteller-info">

							<h6><?php echo esc_html( $s->name ); ?></h6>
							<span><?php echo esc_html( $s->participant_type->name ); ?></span>

						</div>
					
					</div>

				<?php endforeach; ?>					

				</section>

			<?php endif; ?>

			<section class="story__meta__item story__meta__item--date">

				<?php echo esc_html( mysql2date('F jS, Y', $exchange->date ) ); ?>

			</section>

			<?php if ( ! empty( $exchange->category ) ) : ?>

				<section class="story__meta__item story__meta__item--category">
					<?php $exchange->publish_category(); ?>
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
