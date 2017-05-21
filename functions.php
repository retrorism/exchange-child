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

// WP Head and other cleanup functions
require_once( get_template_directory().'/assets/functions/cleanup.php' );

// Register custom menus and menu walkers
require_once( get_template_directory().'/assets/functions/menu.php' );

// Register sidebars/widget areas
require_once( get_template_directory().'/assets/functions/sidebar.php' );

// Makes WordPress comments suck less
require_once( get_template_directory().'/assets/functions/comments.php' );

// Replace 'older/newer' post links with numbered navigation
require_once( get_template_directory().'/assets/functions/page-navi.php' );

// Adds support for multiple languages
require_once( get_template_directory().'/assets/translation/translation.php' );

// Remove 4.2 Emoji Support
require_once( get_template_directory().'/assets/functions/disable-emoji.php' );

// Related post function - no need to rely on plugins
require_once( get_template_directory().'/assets/functions/related-posts.php' );

// Theme support options
require_once( get_template_directory().'/assets/functions/theme-support.php' );

/**
 * Child Theme specific function requires
 **/

// Theme support options
require_once( get_stylesheet_directory().'/assets/functions/child-theme-support.php' );

// Register scripts and stylesheets
require_once( get_stylesheet_directory().'/assets/functions/enqueue-scripts.php' );

// Customize the WordPress login menu
require_once( get_stylesheet_directory().'/assets/functions/login.php' );

// Customize post-types
require_once( get_stylesheet_directory().'/assets/functions/post-types.php' );

// Customize globals
require_once( get_stylesheet_directory().'/assets/functions/child-theme-globals.php' );

// Customize taxonomies
require_once( get_stylesheet_directory().'/assets/functions/taxonomies.php' );

// Customize functions
require_once( get_stylesheet_directory().'/assets/functions/public.php' );

// Customize related-post-functions
require_once( get_stylesheet_directory().'/assets/functions/related-posts.php' );


if ( is_admin() ) {

	// Customize the WordPress admin
	require_once( get_template_directory().'/assets/functions/admin.php' );

	// Customize ACF field functions
	require_once( get_stylesheet_directory().'/assets/functions/admin-acf.php' );

	// Add options 
	require_once( get_stylesheet_directory().'/assets/functions/admin-options.php' );
	
}