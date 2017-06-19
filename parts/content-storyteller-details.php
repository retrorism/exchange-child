<section class="storyteller__details">

	<div class="participant__meta-inner">

		<?php if ( ! empty( $exchange->details ) ) : ?>

		<?php if ( ! empty( $exchange->details['participant_headline'] )
		|| ! empty( $exchange->details['participant_headline_extension'] ) ) : ?>
		<section class="storyteller__details__headline">
		
		<?php if ( ! empty( $exchange->details['participant_headline'] ) ) : ?>
			<?php echo wpautop( esc_html( $exchange->details['participant_headline'] ) ); ?>
		<?php endif; ?>
		<?php if ( ! empty( $exchange->details['participant_headline_extension'] ) ) : ?>
			<?php echo wpautop( esc_html( $exchange->details['participant_headline_extension'] ) ); ?>
		<?php endif; ?>
		</section>	
		<?php endif; ?>

		<table class="storyteller__details__items">
			<tbody>
				<tr>
			<?php if ( ! empty( $exchange->details['participant_country'] ) ) : ?>
					<td class="storyteller__details__item"><?php echo esc_html( $exchange->details['participant_country'] ); ?></td>
			<?php endif; ?>

			<?php if ( ! empty( $exchange->details['participant_initiative'] ) ) : ?>
					<td class="storyteller__details__item"><?php
						$p_website_url = $exchange->details['participant_website_url'];
						if ( ! empty( $p_website_url ) ) : ?>
							<a href="<?php echo esc_url( $p_website_url ); ?>" title="<?php echo wp_sprintf( __('Navigate to the website of %s', 'exchange'), $exchange->details['participant_initiative'] ); ?>">
						<?php endif; ?>
						<?php echo esc_html( $exchange->details['participant_initiative'] ); ?>
						<?php if ( ! empty( $p_website_url ) ) : ?>
							</a>
						<?php endif; ?></td>
			<?php endif; ?>
				</tr>
			</tbody>
		</table>

		<?php endif; ?>

	</div>

</section>