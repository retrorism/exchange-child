<?php
/**
 * @package Exchange Child Theme II: Citizenslab
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
};
 add_action( 'after_setup_theme', 'exchange_cl_theme_support' );

 function exchange_cl_theme_support() {
	add_theme_support( 'language_tags' );
	add_theme_support( 'lowercase_tags' );
	add_theme_support( 'decorated_section_headers' );
	add_theme_support( 'exchange_participant_profiles');
}