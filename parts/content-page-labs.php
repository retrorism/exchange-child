<?php 
 /**
 * Labs Overview content part
 * Author: Willem Prins | SOMTIJDS
 * Project: CitizensLab
 * Date created: 26/04/2017
 *
 * @package Exchange Child Theme II: Citizenslab
 **/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
};
?>

<?php $lab_circle = exchange_cl_create_lab_circle(); ?>

<section class="story__section">
	
	<div class="section-inner">

		<?php if ( $lab_circle ) : ?>

			<?php include_once( get_stylesheet_directory() . '/parts/content-page-labs-illustration.php' ); ?>
	
		<?php endif; ?>

	</div>

</section>

<section class="section--has_grid section--coloured section--sandbox section--labs_grid">
	
	<?php echo BasePattern::build_edge_svg('top', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>

		<div class="section-inner">

			<?php if ( $lab_circle ) : ?>
			
				<?php include_once( get_stylesheet_directory() . '/parts/content-page-labs-grid.php' ); ?>

			<?php endif; ?>

		</div>
	
	<?php echo BasePattern::build_edge_svg('bottom', exchange_slug_to_hex( 'sandbox-cl' ) ); ?>

</section>
