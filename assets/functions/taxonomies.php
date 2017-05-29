<?php
/**
 * Functions for taxonomy creation.
 * Author: Willem Prins | SOMTIJDS
 * Project: Tandem
 * Date created: 31/03/2016
 *
 * @package Exchange Plugin
 **/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
};

remove_action( 'init', 'exchange_connect_default_taxonomies' );
remove_action( 'init', 'exchange_modify_post_tag' );

remove_action( 'init', 'exchange_create_taxonomies' );
add_action( 'init', 'exchange_cl_create_taxonomies' );

remove_action( 'save_post_programme_round', 'exchange_create_tax_for_programme_round', 10, 3 );
remove_action( 'save_post_poration', 'exchange_set_post_tag_from_parent_id', 10, 3 );
remove_action( 'save_post_story', 'exchange_set_attachments_post_tag', 10, 4 );
remove_action( 'save_post_poration', 'exchange_set_attachments_post_tag', 10, 4 );
remove_action( 'save_post_programme_round', 'exchange_set_attachments_post_tag', 10, 4 );
remove_action( 'attachment_updated', 'exchange_set_attachment_media_tags', 10, 3 );
remove_action( 'template_redirect', 'exchange_url_rewrite_templates_for_post_type' );

function exchange_cl_create_taxonomies() {

	// Register language as taxonomy.
	register_taxonomy(
		'language',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		array( 'story', 'page' ), // Post type name.
		array(
			'hierarchical' => false,
			'sort'         => true,
			'label'        => 'Languages',  // Display name.
			'show_ui'      => true,
			'show_in_menu' => true,
			'show_in_quick_edit' => false,
			'meta_box_cb'  => false,
			'public'       => true,
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => 'language', // This controls the base slug that will display before each term.
				'with_front' => false, // Don't display the category base before.
			),
			'labels'       => array(
				'add_new_item' => 'Add new language tag',
			),
		)
	);

	// Register language as taxonomy.
	register_taxonomy(
		'lab',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		array( 'story', 'page' ), // Post type name.
		array(
			'hierarchical' => false,
			'sort'         => true,
			'label'        => __( 'Labs', EXCHANGE_PLUGIN ),
			'show_ui'      => true,
			'show_in_menu' => true,
			'show_in_quick_edit' => false,
			'meta_box_cb'  => false,
			'public'       => false,
			'query_var'    => true,
			'rewrite'      => false,
			'labels'       => array(
				'add_new_item' => 'Add a new Lab',
			),
		)
	);

	// Register theme as taxonomy.
	register_taxonomy(
		'topic',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		array( 'story', 'page' ), // Post type name.
		array(
			'hierarchical' => false,
			'sort'         => true,
			'label'        => __( 'Topics', EXCHANGE_PLUGIN ),  // Display name.
			'show_ui'      => true,
			'show_in_menu' => true,
			'show_admin_column' => true,
			'show_in_quick_edit' => false,
			'meta_box_cb'  => false,
			'public'       => true,
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => 'topics', // This controls the base slug that will display before each term.
				'with_front' => false, // Don't display the category base before.
			),
		)
	);

	// Register location as taxonomy.
	register_taxonomy(
		'location',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		array( 'story', 'page', 'participant' ), // Post type name.
		array(
			'hierarchical' => false,
			'sort'         => true,
			'label'        => __( 'Cities', EXCHANGE_PLUGIN ),  // Display name.
			'show_ui'      => true,
			'show_in_menu' => true,
			'show_in_quick_edit' => true,
			'meta_box_cb'  => false,
			'public'       => true,
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => 'cities', // This controls the base slug that will display before each term.
				'with_front' => true, // Don't display the category base before.
			),
		)
	);

	// Register methodologies as taxonomy.
	register_taxonomy(
		'discipline',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		array( 'story', 'page', 'participant' ), // Post type name.
		array(
			'hierarchical' => false,
			'sort'         => true,
			'label'        => __( 'Expertises', EXCHANGE_PLUGIN ),  // Display name.
			'show_ui'      => true,
			'show_in_menu' => true,
			'show_in_quick_edit' => true,
			'meta_box_cb'  => false,
			'public'       => false,
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => 'expertises', // This controls the base slug that will display before each term
				'with_front' => false, // Don't display the category base before.
			),
		)
	);

	// Register methodologies as taxonomy.
	register_taxonomy(
		'participant_type',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		array( 'participant' ), // Post type name.
		array(
			'hierarchical' => false,
			'sort'         => true,
			'label'        => __( 'Member Types', EXCHANGE_PLUGIN ),  // Display name.
			'show_ui'      => true,
			'show_in_menu' => true,
			'show_in_quick_edit' => true,
			'meta_box_cb'  => false,
			'public'       => true,
			'query_var'    => true,
			'rewrite'      => false, // Don't display the category base before.
		)
	);

	// Register discipline as taxonomy.
	register_taxonomy(
		'methodology',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		array( 'story', 'page' ), // Post type name.
		array(
			'hierarchical' => false,
			'sort'         => true,
			'label'        => __( 'Resources', EXCHANGE_PLUGIN ),  // Display name.
			'show_ui'      => true,
			'show_in_menu' => true,
			'show_in_quick_edit' => false,
			'meta_box_cb'  => false,
			'choose_from_most_used' => null,
			'public'       => true,
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => 'resources', // This controls the base slug that will display before each term.
				'with_front' => false, // Don't display the category base before.
			),
		)
	);

}

function exchange_cl_add_term_to_p_name( $p_name, $arr ) {
	$p_tag_args = array(
	  'post_type' => 'participant',
	  'posts_per_page' => 1,
	  'post_status' => 'publish',
	  'title' => $p_name,
	);
	echo "attaching term to " . $p_name;
	wp_reset_postdata();
	// create new query with this metavalue
	$p_query = new WP_Query($p_tag_args);
	var_dump( $p_tag_args );
	// result is p_post_id;
	if ( ! empty( $p_query->posts ) ) {
		var_dump( $p_query->posts );
		$p = $p_query->posts[0];
		if ( $p->post_type == 'participant' ) {
			//print_r( $arr );
			foreach ( $arr as $tax => $terms ) {
				$ints = array();
				foreach ( $terms as $term ) {
					add_taxo( $tax, $term );
					$obj = get_term_by( 'name', htmlspecialchars( $term ), $tax, 'slug');
					var_dump( $obj );
					if ( is_object( $obj ) && get_class( $obj ) === 'WP_Term' ) {
						if ( ! empty( $obj->term_id ) ) {
							$ints[] = intval( $obj->term_id );
						}
					}
				}
				$ints = array_unique( $ints );
				echo $p->post_title . '<br />';
				$result = wp_set_object_terms( $p->ID, $ints, $tax, true );
				var_dump( $result );
				echo '<hr />';
			}
		}
	}
}

function exchange_cl_expertise_importer() {
	$fh = fopen( get_stylesheet_directory() . '/assets/expertise.csv', 'r' );

	if ($fh) {
		$line = 0; // 1
		$headers = array();
		while ( ( $row = fgetcsv( $fh ) ) !== false ) {
			// csv headings, so continue/ignore this iteration:
			if ($line == 0) { // 2
				$headers = $row;
				$line++; // 3
				continue; // 4
			}
			$col = 0;
			$p_name = $row[0];
			$arr = array();
			foreach ( $row as $term ) {
				var_dump( $term );
				if ( ! empty( $term ) && $col > 0 ) {
					$tax = 'discipline';
					echo $p_name . ': ' . $tax . ': ' . $term . '<br />';
					$arr[$tax][] = $term;
					$taxo = add_taxo( $tax, $term );
					var_dump( $taxo );
					exchange_cl_add_term_to_p_name( $p_name, $arr );
				}
				$col++;
			}
			// Keep logic here to add to database, line 1 onwards
		}
	}

	fclose($fh);
}