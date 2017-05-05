<?php
/**
 * Post types creation
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

/* Hook post creation to init. */
remove_action( 'init', 'exchange_create_collaboration' );
remove_action( 'init', 'exchange_create_programme_round' );
remove_action( 'init', 'exchange_create_participant', 11 );
add_action( 'init', 'exchange_child_create_member', 11);

// Register participant as Post Type.
function exchange_child_create_member() {

	// Set up labels.
	$labels = array(
		'name'               => 'People',
		'singular_name'      => 'Member',
		'add_new'            => 'Add new member',
		'add_new_item'       => 'Add new member',
		'edit_item'          => 'Edit member',
		'new_item'           => 'New member',
		'all_items'          => 'All members',
		'view_item'          => 'View member',
		'search_items'       => 'Search members',
		'not_found'          => 'No members Found',
		'not_found_in_trash' => 'No member found in Trash',
		'menu_name'          => 'Members',
	);

	// Register post type.
	register_post_type( 'participant', array(
		'labels'              => $labels,
		'has_archive'         => true,
		'menu_icon'           => 'dashicons-groups',
		'menu_position'       => 13,
		'public'              => true,
		'show_ui'             => true,
		// Other items that are available for this array: 'title','editor','author','thumbnail','excerpt','trackbacks', 'custom-fields','comments','revisions','page-attributes','post-formats'.
		'supports'            => array( 'title' ),
		'rewrite'			  => array(
			'slug' => 'people',
		),
		'capability_type'     => 'post',
		)
	);
}