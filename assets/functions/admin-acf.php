<?php
/**
 * Customizing ACF functions
 * Author: Willem Prins | SOMTIJDS
 * Project: CitizensLab
 * Date created: 28/04/2016
 *
 * @package Exchange Child Theme II: Citizenslab
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
};

remove_action( 'acf/input/admin_head', 'exchange_change_acf_color_picker' );
add_action( 'acf/input/admin_head', 'exchange_cl_change_acf_color_picker' );

function exchange_cl_change_acf_color_picker() {

	$client_colors_bg_array = array();
	$client_colors_accents_array = array();
	$client_colors_boxes_array = array();

	foreach ( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOUR_PICKERS']['bg'] as $value ) {
		$client_colors_bg_array[] = '#'.$value;
	}

	foreach ( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOUR_PICKERS']['accents'] as $value ) {
		$client_colors_accents_array[] = '#'.$value;
	}

	foreach ( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOUR_PICKERS']['boxes'] as $value ) {
		$client_colors_boxes_array[] = '#'.$value;
	}

	$client_colors_bg_jquery = json_encode( $client_colors_bg_array );
	$client_colors_accents_jquery = json_encode( $client_colors_accents_array );
	$client_colors_boxes_jquery = json_encode( $client_colors_boxes_array );

	echo "<script>
		(function($){
		acf.add_action('ready append', function() {
		  acf.get_fields({ type : 'color_picker'}).each(function() {
			var acfpalette = " . $client_colors_bg_jquery . ";
			if ( $(this).find('.wp-color-picker').parents('*[data-name=\"pquote_colour\"]').length > 0 ) {
			  var acfpalette = ". $client_colors_bg_jquery . ";
			}
			if ( $(this).find('.wp-color-picker').parents('*[data-name=\"tape_colour\"]').length > 0 ) {
			  var acfpalette = ". $client_colors_accents_jquery .";
			}
			if ( $(this).find('.wp-color-picker').parents('*[data-name=\"decoration_colour\"]').length > 0 ) {
			  var acfpalette = ". $client_colors_accents_jquery .";
			}
			if ( $(this).find('.wp-color-picker').parents('*[data-name=\"post-it_colour\"]').length > 0 ) {
			  var acfpalette = " . $client_colors_boxes_jquery . ";
			}
			if ( $(this).find('.wp-color-picker').parents('*[data-name=\"box_colour\"]').length > 0 ) {
			  var acfpalette = ". $client_colors_boxes_jquery . ";
			}
			if ( $(this).find('.wp-color-picker').parents('*[data-name=\"cta_colour\"]').length > 0 ) {
			  var acfpalette = ". $client_colors_boxes_jquery .";
			}
			$(this).iris({
			  color: $(this).find('.wp-color-picker').val(),
			  mode: 'hsv',
			  palettes: acfpalette,
			  change: function(event, ui) {
				$(this).find('.wp-color-result').css('background-color', ui.color.toString());
				$(this).find('.wp-color-picker').val(ui.color.toString());
			  }
			});
		  });
		});
	})(jQuery);
	</script>";
}

remove_action( 'save_post', 'exchange_update_location_transients_on_save', 10, 2 );

add_action( 'save_post', 'exchange_cl_update_location_transients_on_save', 10, 2 );

function exchange_cl_update_location_transients_on_save( $post_id, $post_obj ) {

	$type = $post_obj->post_type;
	if ( $type !== 'participant' ) {
		return;
	}
	$stored_locations = get_transient('participant_locations');
	
	if ( empty( $stored_locations ) ) {
		$stored_locations = array();
	}
	if ( ! is_array( $stored_locations ) ) {
		return;
	}
	$p = BaseController::exchange_factory( $post_obj );
	if ( ! $p instanceof Participant || false === $p->has_locations ) {
		return;
	}
	$stored_locations[ $p->post_id ] = $p->locations;
	set_transient( 'participant_locations', $stored_locations, 365 * 24 * HOUR_IN_SECONDS );
}


/**
 * If set, add Google Maps API key filter
 */
add_filter( 'acf/settings/google_api_key','exchange_cl_add_acf_google_maps_api_key_filter' );

function exchange_cl_add_acf_google_maps_api_key_filter() {
	if ( ! defined('EXCHANGE_PLUGIN' ) ) {
		return;
	}
	$key = get_option( EXCHANGE_PLUGIN . '_acf_google_maps_api_key' );

	if ( ! empty( $key ) && is_string( $key ) ) {
		return $key;
	}
}