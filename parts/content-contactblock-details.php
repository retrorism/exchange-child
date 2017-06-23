<section class="storyteller__details">

	<div class="participant__meta-inner">

		<table class="storyteller__details__items">
			<tbody>
			<?php if ( ! empty ( $user_meta['user_position'][0] ) ) : ?>
				<tr>
					<td class="participant__details__item-label"><?php _e( 'Position','exchange' ); ?></td>
					<td class="participant__details__item-content">
					<?php echo esc_html( $user_meta['user_position'][0] ); ?>
					<?php if ( ! empty( $user_meta['user_organisation'][0] ) ) : ?> at 
						<?php if ( ! empty( $user_meta['user_organisation_link'][0] ) ) : ?>
							<a href="<?php echo esc_url( $user_meta['user_organisation_link'][0] ); ?>" title="<?php echo wp_sprintf( __('Navigate to the website of %s', 'exchange'), $user_meta['user_organisation'][0] ); ?>">
						<?php endif; ?>
					<?php endif; ?>
					<?php echo esc_html( $user_meta['user_organisation'][0] ); ?>
					<?php if ( ! empty( $user_meta['user_organisation_link'] ) ) : ?>
						</a>
					<?php endif; ?>
					</td>
				</tr>
			<?php endif; ?>

			<?php if ( ! empty( $user_meta['user_phone'][0] ) ) : ?>
				<tr>
					<td class="participant__details__item-label"><?php _e( 'Phone','exchange' ); ?></td>
					<td class="participant__details__item-content"><?php echo $user_meta['user_phone'][0]; ?></td>
				</tr>
			<?php endif; ?>
			<?php if ( ! empty( $user_info['user_email'] ) && function_exists( 'eae_encode_str' ) ) : ?>
				<tr>
				<?php $mem = eae_encode_str( $user_info['user_email'] );
					$icon = exchange_build_svg( get_stylesheet_directory() .'/assets/images/svg/T_icon_email_WEB.svg' ); ?>
					<td class="participant__details__item-label"><?php _e( 'E-mail','exchange' ); ?></td>
					<td class="participant__details__item-content">
						<a href="mailto:<?php echo $mem; ?>"><?php echo $mem; ?></a>
					</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>

	</div>

</section>

