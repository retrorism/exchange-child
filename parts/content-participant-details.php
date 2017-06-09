<section class="participant__details">

	<div class="participant__meta-inner">

		<?php if ( ! empty( $exchange->details ) ) : ?>

		<?php if ( ! empty( $exchange->details['participant_headline'] )
		|| ! empty( $exchange->details['participant_headline_extension'] ) ) : ?>
		<section class="participant__details__headline">
		
		<?php if ( ! empty( $exchange->details['participant_headline'] ) ) : ?>
			<?php echo wpautop( esc_html( $exchange->details['participant_headline'] ) ); ?>
		<?php endif; ?>
		<?php if ( ! empty( $exchange->details['participant_headline_extension'] ) ) : ?>
			<?php echo wpautop( esc_html( $exchange->details['participant_headline_extension'] ) ); ?>
		<?php endif; ?>
		</section>	
		<?php endif; ?>

		<table class="participant__details__items">
			<tbody>
			
			<?php if ( $exchange->has_tags ) : ?>
				<tr>
					<td class="participant__details__item-label"><?php _e( 'Expertise','exchange' ); ?></td>
					<td class="participant__details__item-content participant__details__tags"><?php $exchange->publish_tags( 'participant__details', 'discipline' ); ?></td>
				</tr>
			<?php endif; ?>
			
			<?php if ( ! empty( $exchange->details['participant_initiative'] ) ) : ?>
				<tr>
					<td class="participant__details__item-label"><?php _e( 'Initiative','exchange' ); ?></td>
					<td class="participant__details__item-content">
					<?php
						$p_website_url = $exchange->details['participant_website_url'];
						if ( ! empty( $p_website_url ) ) : ?>
							<a href="<?php echo esc_url( $p_website_url ); ?>" title="<?php echo wp_sprintf( __('Navigate to the website of %s', 'exchange'), $exchange->details['participant_initiative'] ); ?>">
						<?php endif; ?>
						<?php echo esc_html( $exchange->details['participant_initiative'] ); ?>
						<?php if ( ! empty( $p_website_url ) ) : ?>
							</a>
						<?php endif; ?></td>
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
			<?php if ( ! empty( $exchange->details['participant_google_plus_profile_url'] )
				|| ! empty( $exchange->details['participant_facebook_profile_url'] )
				|| ! empty( $exchange->details['participant_linkedin_profile_url'] )
				|| ! empty( $exchange->details['participant_twitter_profile_url'] ) ) : ?>
				<tr>
					<td class="participant__details__item-label"><?php _e( 'Social Media','exchange' ); ?></td>
					<td class="participant__details__item-content"><?php echo exchange_cl_build_participant_social_icons( $exchange ); ?></td>
				</tr>
			<?php endif; ?>

			</tbody>
		</table>

		<?php endif; ?>

	</div>

</section>