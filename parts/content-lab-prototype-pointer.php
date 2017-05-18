<?php
/**
 * Sharing Footer Content Template
 * Author: Willem Prins | SOMTIJDS
 * Project: Tandem
 * Date created: 14/08/2016
 *
 * @package Exchange
 **/
// Exit if accessed directly.
?>
<?php
	$lab_pointer_page = get_option( 'options_lab_explanation_page' );
	$lab_pointer_text = get_option( 'options_lab_explanation_text' );
	$lab_pointer_link_text = get_option( 'options_lab_explanation_link_text' );
	$lab_pointer_link_string = ! empty( $lab_pointer_link_text ) ? $lab_pointer_link_text : 'prototypes';
	$how_do_we_work = get_page_by_title( 'How do we work?' );
	$lab_pointer_fallback = exchange_cl_create_link( $how_do_we_work, false );
	if ( ! empty( $lab_pointer_page ) || ! empty( $lab_pointer_fallback ) ) : ?>

	<?php $lab_pointer_link = ! empty( $lab_pointer_page ) ? exchange_cl_create_link( $lab_pointer_page, false ) . $lab_pointer_link_string . '</a>' : $lab_pointer_fallback . $lab_pointer_link_string . '</a>'; ?>
	<?php $lab_pointer_paragraph = ! empty( $lab_pointer_text ) 
		? wp_sprintf( $lab_pointer_text, $lab_pointer_link )
		: wp_sprintf( __( 'Read more about our %s' ), $lab_pointer_link ); ?>

		<section class="story__footer__section footer__section section--its-just-me">

			<div class="section-inner">
			
				<div class="section__slice section__paragraph paragraph">
					<p><?php echo $lab_pointer_paragraph; ?></p>
				</div>
			</div>

		</section>


<?php endif; ?>