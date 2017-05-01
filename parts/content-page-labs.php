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

<section class="story__section">
	<div class="section-inner">
		<figure class="section__slice section__image">
			<div id="programmes">
			<?php
				$img_root = get_template_directory() . '/assets/images/';
				global $post;
				$all_pages = BaseController::get_all_from_type( 'page' );
				$programmes = get_page_children( $post->ID, $all_pages );
				foreach ( $programmes as $page_obj ) {
					$anchor = '<a href="#">';
					if ( ! $page_obj instanceof WP_Post || 'publish' !== $page_obj->post_status ) {
						continue;
					} else {
						$anchor = exchange_create_link( BaseController::exchange_factory( $page_obj ), false );
						$slug = array_search( $page_obj->post_title, $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['IMAGES']['lab-illustrations'] );
						if ( ! empty( $slug ) ) {
							
						}

					}
				}
			?>
			</div>
		</figure>
	</div>
</section>
