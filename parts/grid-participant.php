<?php 
	$p_type = 'default';
	if ( current_theme_supports( 'exchange_participant_types' ) && ! empty( $exchange->participant_type ) ) {
		$p_type = $exchange->participant_type->slug;
	}
?>

<div data-equalizer-watch class="griditem__content griditem__content--<?php echo esc_attr( $p_type ); ?>">
	<div class="griditem__content-border">
		<!-- IMAGE -->
		<?php echo exchange_create_link( $exchange, false ); ?>
		<?php if ( $exchange->has_featured_image ) : ?>
			<?php 
				$image_context = 'griditem';
				if ( current_theme_supports( 'exchange_participant_profiles') && 'participant' === $exchange->type ) {
					$image_context = 'participant';
				}
			$exchange->publish_featured_image( $image_context ); ?>
		<?php else : ?>
			<img src="<?php echo esc_url( exchange_cl_get_random_bubble_image() ); ?>" alt="<?php _e( 'This CitizensLab Member does not have a profile image yet','exchange' ); ?>" width="100%" height="auto" />		
		<?php endif; ?>
		</a>

		<!-- META -->
		<?php /*  */ ?>
		<div class="griditem__content-inner">
			<!-- CATEGORY -->
			<?php if ( ! empty( $exchange->category ) ) : ?>
				<?php $exchange->publish_category( 'griditem'); ?>
			<?php endif; ?>		

			<!-- TAGS -->
			<?php if ( $exchange->has_tags ) : ?>
				<div class='griditem__tags'><?php $exchange->publish_tags('griditem'); ?></div>
			<?php endif; ?>

			<!-- TITLE -->
			<?php echo exchange_create_link( $exchange, false ); ?>
				<h4 class="griditem__title"><?php echo $exchange->title; ?></h4>
			</a>
			<?php if ( current_theme_supports( 'exchange_participant_types' ) && ! empty( $exchange->participant_type ) ) : ?>
				<h5 class="griditem__subtitle"><?php echo esc_html( $exchange->participant_type->name ); ?></h5>
			<?php endif; ?>

			<!-- INTRO / EXCERPT -->
			<?php if ( ! empty( $exchange->details['participant_headline'] ) ) {
					$p_headline = new Paragraph( $exchange->details['participant_headline'] );
				} elseif ( ! empty( $exchange->details['participant_headline_extension'] ) ) {
					$p_headline = new Paragraph( $exchange->details['participant_headline_extension'] );
				} ?>
			
			<?php if ( isset( $p_headline ) && $p_headline instanceof Paragraph ) : ?>
				<div class='griditem__intro-wrapper'>
					<p><?php $p_headline->publish_stripped( 'griditem', 22 ); ?></p>
				</div>
			<?php endif; ?>

			<table class="participant__details__items">
				<tbody>
					<?php if ( ! empty( $exchange->details['participant_initiative'] ) ) : ?>
						<tr>
							<td class="participant__details__item-label"><?php echo esc_html( $exchange->details['participant_initiative'] ); ?></td>
						</tr>
					<?php endif; ?>
					
					<?php if ( ! empty( $exchange->details['participant_country'] ) ) : ?>
						<tr>
							<td class="participant__details__item-label"><?php echo esc_html( $exchange->details['participant_country'] ); ?></td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>

			<!-- READMORE -->
			<div class='griditem__read-full-story'>
				<?php echo exchange_cl_create_link( $exchange, true, '' ); ?>
			</div>
		</div>
	</div>
</div>