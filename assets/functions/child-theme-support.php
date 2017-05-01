<?php
/**
 * @package Exchange Child Theme II: Citizenslab
 */

 add_action( 'after_setup_theme', 'exchange_cl_theme_support' );

 function exchange_cl_theme_support() {
	add_theme_support( 'language_tags' );
	add_theme_support( 'lowercase_tags' );
	add_theme_support( 'decorated_section_headers' );
}