<?php
/**
 * Functions for archive templates
 * Author: Willem Prins | SOMTIJDS
 * Project: Tandem
 * Date created: 17/05/2016
 *
 * @package Exchange Plugin
 **/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
};

/**
 * undocumented function
 *
 * @return void
 * @author
 * @var string $lab serves 
 **/
function exchange_cl_get_lab_stories( $lab ) {
	if ( empty( $lab ) || ! is_string( $lab ) ) {
		return;
	}
	$lab_id = term_exists( $lab, 'lab' );

	if ( empty( $lab_id ) ) {
		return;
	}
	$args = array(
		'post_type'   => 'story',
		'post_status' => 'publish',
		'tax_query'   => array(
			array(
				'taxonomy' => 'lab',
				'field'    => 'term_id',
				'terms'    => $lab_id,
			),
		),
	);
	$included_cats = get_option('options_lab_story_categories');
	if ( ! empty( $included_cats ) && is_array( $included_cats ) ) {
		$args['category__in'] = $included_cats;
	}
	$stories_query = new WP_Query( $args );

	if ( $stories_query->have_posts() ) {
		return $stories_query->posts;
	}
}

function exchange_cl_create_lab_griditems( $lab ) {
	if ( empty( $lab ) || ! is_string( $lab ) ) {
		return;
	}
	$stories = exchange_cl_get_lab_stories( $lab );
	if ( empty( $stories ) ) {
		return;
	}
	$griditems = array();
	foreach( $stories as $story ) {
		$griditem = exchange_cl_create_griditem_from_post( $story, 'featuredgrid' );
		if ( $griditem ) {
			$griditems[] = $griditem;
		}
	}
	if ( count( $griditems ) > 0 ) {
		return $griditems;
	}
}
