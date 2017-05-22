<section class="participant__details">

	<div class="participant__meta-inner">

		<?php if ( ! empty( $exchange->details ) ) : ?>

		<?php if ( ! empty( $exchange->details['participant_headline'] ) ) : ?>
		<section class="participant__details__headline">
			<?php echo esc_html( $exchange->details['participant_headline'] ); ?>
		</section>
		<?php endif; ?>

		<table class="participant__details__items">
			<tbody>
			
			<?php if ( ! empty( $exchange->expertise ) ) : ?>
				<tr>
					<td class="participant__details__item-label"><?php _e( 'Expertise','exchange' ); ?></td>
					<td class="participant__details__item-content"><?php echo esc_html( $exchange->expertise ); ?></td>
				</tr>
			<?php endif; ?>
			
			<?php if ( ! empty( $exchange->details['participant_initiative'] ) ) : ?>
				<tr>
					<td class="participant__details__item-label"><?php _e( 'Initiative','exchange' ); ?></td>
					<td class="participant__details__item-content"><?php echo esc_html( $exchange->details['participant_initiative'] ); ?></td>
				</tr>
			<?php endif; ?>
			
			<?php if ( ! empty( $exchange->details['participant_country'] ) ) : ?>
				<tr>
					<td class="participant__details__item-label"><?php _e( 'Country','exchange' ); ?></td>
					<td class="participant__details__item-content"><?php echo esc_html( $exchange->details['participant_country'] ); ?></td>
				</tr>
			<?php endif; ?>

			<?php if ( ! empty( $exchange->details['participant_town'] ) ) : ?>
				<tr>
					<td class="participant__details__item-label"><?php _e( 'Location','exchange' ); ?></td>
					<td class="participant__details__item-content"><?php echo esc_html( $exchange->details['participant_town'] ); ?></td>
				</tr>
			<?php endif; ?>

			<?php if ( $exchange->has_contactme ) : ?>
				<tr>
					<td class="participant__details__item-label"><?php _e( 'E-mail','exchange' ); ?></td>
					<td class="participant__details__item-content"><?php $exchange->publish_contactme(); ?></td>
				</tr>
			<?php endif; ?>

			<?php if ( ! empty( $exchange->details['participant_google_plus_url'] )
				|| ! empty( $exchange->details['participant_facebook_url'] )
				|| ! empty( $exchange->details['participant_linkedin_url'] )
				|| ! empty( $exchange->details['participant_twitter_url'] ) ) : ?>
				<tr>
					<td class="details__table__label"><?php _e( 'E-mail','exchange' ); ?></td>
					<td class="details__table__content"><?php echo exchange_cl_build_participant_social_icons(); ?></td>
				</tr>
			<?php endif; ?>

			</tbody>
		</table>

		<?php endif; ?>

	</div>

</section>