<?php
/**
 * Customizing ACF functions
 * Author: Willem Prins | SOMTIJDS
 * Project: CitizensLab
 * Date created: 18/05/2017
 *
 * @package Exchange Child Theme II: Citizenslab
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
};

//remove_action( 'admin_menu', 'exchange_register_settings');
add_action( 'admin_menu', 'exchange_cl_register_settings', 11 );


/**
 * undocumented function
 *
 * @return void
 * @author 
 **/
function exchange_cl_register_settings () {

	if ( defined('EXCHANGE_PLUGIN') && class_exists( 'acf' ) ) {

		add_settings_field(
			EXCHANGE_PLUGIN . '_acf_google_maps_api_key',
			__( 'Google Maps Api Key', EXCHANGE_PLUGIN ),
			'exchange_cl_settings_acf_google_maps_api_key_cb',
			EXCHANGE_PLUGIN,
			EXCHANGE_PLUGIN . '_general',
			array( 'label_for' => EXCHANGE_PLUGIN . '_acf_google_maps_api_key' )
		);

		register_setting( EXCHANGE_PLUGIN, EXCHANGE_PLUGIN . '_acf_google_maps_api_key', 'exchange_settings_sanitize_byline_template' );
	}

}

/**
 * Render the ACF Google Maps API key field
 *
 * @since  0.1.0
 */
function exchange_cl_settings_acf_google_maps_api_key_cb() {
	
	$key = get_option( EXCHANGE_PLUGIN . '_acf_google_maps_api_key' );
	?>
	<fieldset>
		<label for="<?php echo EXCHANGE_PLUGIN .'_acf_google_maps_api_key' ?>">
			<?php _e( 'You will need this to use the Google Maps field in ACF', EXCHANGE_PLUGIN ); ?>
		</label>
		<input type="text" size="50"
			name="<?php echo EXCHANGE_PLUGIN . '_acf_google_maps_api_key' ?>"
			id="<?php echo EXCHANGE_PLUGIN . '_acf_google_maps_api_key' ?>"
			<?php if ( ! empty( $key) ) : ?>
			value="<?php echo esc_attr( $key ); ?>"
			<?php else : ?>
			placeholder="<?php _e('Paste the API key here', EXCHANGE_PLUGIN ); ?>"
			<?php endif; ?>
	</fieldset>
	<?php

}