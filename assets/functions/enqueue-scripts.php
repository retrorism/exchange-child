<?php
function exchange_cl_site_scripts() {
    global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    wp_dequeue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery','foundation-js', 'masonry-js' ), '', true );

    wp_enqueue_script( 'child-theme-site-js', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery','foundation-js', 'masonry-js' ), '', true );

	wp_localize_script( 'child-theme-site-js', 'exchange_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action('wp_enqueue_scripts', 'exchange_cl_site_scripts', 999);