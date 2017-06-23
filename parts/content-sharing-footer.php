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
<section class="story__footer__section footer__section">

	<div class="section-inner">

		<div class="share-cta-wrapper">

			<p class="share-cta-header share-cta-social"><?php printf( __( 'Share this %s:','exchange'), $exchange->type ); ?></p>

			<?php echo exchange_cl_build_social_icons( 'footer', array('facebook','twitter','email'), $exchange ); ?>
			<br />

		</div class="share-cta-wrapper">

	</div><!-- end section-inner -->

</section>
