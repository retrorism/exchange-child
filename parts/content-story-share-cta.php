<h3 class="share-cta-header share-cta-story"><?php _e( 'Do you have a story to share?','exchange' ); ?></h3>

<div class="button-wrapper">
<?php
	$story_form_page = get_option( 'options_story_update_form_page' );
	if ( ! empty( $story_form_page ) ) {
		$exchange_form = BaseController::exchange_factory( $story_form_page );
		if ( $exchange_form instanceof Exchange ) {
			echo exchange_create_link( $exchange_form, false, 'button--large button--share-cta' ) . __('Share your story','exchange') . '</a>';
		}
	}
	?>
</div><!-- button-wrapper -->

<?php 
	$story_cta_text = get_option( 'options_story_cta_text'); 
?>
<div class="share-cta-paragraph">
	<p>
	<?php echo empty( $story_cta_text ) ? __( 'Share your experiences, thoughts and ideas with our network! Your story will be posted on our website. We´d love to hear your voice!', 'exchange' ) : $story_cta_text; ?>
	</p>
</div>
