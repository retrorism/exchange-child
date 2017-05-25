<?php
add_action( 'init', 'exchange_replace_parent_theme_scripts' );

function exchange_replace_parent_theme_scripts(){
	remove_action( 'wp_enqueue_scripts', 'site_scripts', 999 );
	add_action( 'wp_enqueue_scripts', 'exchange_cl_site_scripts', 999 );
}


function exchange_cl_site_scripts() {	

    wp_dequeue_script( 'site-js');

    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.js', array( 'jquery' ), '6.2', true );

    wp_enqueue_script( 'masonry-js', get_template_directory_uri() . '/vendor/masonry/dist/masonry.pkgd.min.js', array(), '', true );

    wp_enqueue_script( 'child-theme-site-js', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery','foundation-js', 'masonry-js' ), false, true );

	wp_localize_script( 'child-theme-site-js', 'exchange_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
