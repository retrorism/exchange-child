<?php
/**
 * Registring GLOBALS
 * Author: Willem Prins | SOMTIJDS
 * Project: CitizensLab
 * Date created: 26/04/2016
 *
 * @package Exchange Child Theme II: Citizenslab
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
};

$GLOBALS['EXCHANGE_PLUGIN_CONFIG'] = array(
	'COLOURS' => array(
		'pink-cl'             => 'e51145',
		'sandbox-cl'          => 'f6f2ed',
		'orange-cl'           => 'ed8700',
		'blue-cl'             => '007586',
		'purple-cl'           => 'a22cf5',
		'green-cl'            => '72904d',
		'yellow-cl'           => 'b5a825',
		'pink-bg-cl'          => 'fbdce2', //GIMP ATTEMPT 1: f187a1 
		'orange-bg-cl'        => 'feedd9',
		'blue-bg-cl'          => 'd9ebed', //GIMP ATTEMPT 1: 7fb9c2
		'purple-bg-cl'        => 'f0e0fd', //GIMP ATTEMPT 1
		'green-bg-cl'         => 'b8c7a5', //GIMP ATTEMPT 1
		'yellow-bg-cl'        => 'd9d391', //GIMP ATTEMPT 1
		'black-tandem'        => '4c4d53', /* Tandem styleguide */
		'white'               => 'fefefe',
		'yellow-1-web'        => 'fffbdb', /* Section bg webguide */
		'salmon-1-web'        => 'fde1c7', /* Section bg webguide */
		'blue-1-web'	      => 'dceff0', /* Section bg webguide */
		'rose-1-web'	      => 'ff8e78', /* Box bg webguide */
		'blue-2-web'	      => '9fd3d6', /* Box bg webguide */
		'yellow-2'            => 'f0c063',
		'yellow-3'            => 'eba847', /* Accents on yellow */
		'yellow-4'            => 'e27f20',
		'salmon-2'            => 'f0c590',
		'salmon-3'            => 'eaab73',
		'salmon-4'            => 'e07856', /* Accents on orange */
		'blue-3'              => '0f9fd6', /* Accents on blue */
		'blue-4'              => '1f588e',
		'related-grid-background' => 'f6f2ed',
		'primary-color' => 'e51145',
	),
	'IMAGES' => array(
		/* 'hq-norm' => 381024,  756 * 504 */
		'hq-norm'       => 345600, /* 720 * 480 */
		'size-in-story' => 'medium-large',
		'fallback_image_att_id' => 970,
		'no-lazy-loading' => array(
			'contactblock',
		),
		'no-caption' => array(
			'contactblock',
			'griditem',
			'emphasisblock',
			'griditem__pattern',
			'participant',
			'story__meta',
			'storyteller-card',
		),
		'programme-logos' => array(
			'C_P'       => 'Tandem C & P',
			'C_P'       => 'Tandem C&P',
			'Europe'    => 'Tandem Europe',
			'Shaml'     => 'Tandem Shaml',
			'Turkey'    => 'Tandem Turkey',
			'Ukraine'   => 'Tandem Ukraine',
			'Solo'      => 'Tandem (solo)',
			'Strapline' => 'Tandem',
		),
	),
	'CATEGORIES' => array (
		'button_labels' => array(
			'story' => __( 'Read the full story', EXCHANGE_PLUGIN ),
			'video' => __( 'Watch the video', EXCHANGE_PLUGIN ),
			'default' => __( 'Read the full %s', EXCHANGE_PLUGIN ),
			'partner' => __( 'Read the full %s story', EXCHANGE_PLUGIN ),
			'team-member' => __( 'Find out more about this %s', EXCHANGE_PLUGIN ),
			'photo-story' => __( 'See the full %s', EXCHANGE_PLUGIN ),
		),
	),
	'TAXONOMIES' => array(
		// Parent programmes (not taxonomized for overall ease ).

		'programmes' => array(
			'C_P'     => 'Tandem C & P',
			'Europe'  => 'Tandem Europe',
			'Shaml'   => 'Tandem Shaml',
			'Turkey'  => 'Tandem Turkey',
			'Ukraine' => 'Tandem Ukraine',
		),
		'labs' => array(
			'culture-and-arts' => array(
				'name'     => 'Culture and Arts',
				'colour'    => 'purple-cl',
				'bg-colour' => 'purple-bg-cl',
				'decoration'   => 'CL_Culture_and_Arts_Bubble',
				'illustration' => 'CL_Culture_and_Arts',
				'sort_order' => 4,
				),
			'democracy' => array(
				'name'     => 'Democracy',
				'colour'    => 'orange-cl',
				'bg-colour' => 'orange-bg-cl',
				'decoration'   => 'CL_Democracy_Bubble',
				'illustration' => 'CL_Democracy',
				'sort_order' => 0,
				),
			'education' => array(
				'name'     => 'Education',
				'colour'    => 'blue-cl',
				'bg-colour' => 'blue-bg-cl',
				'decoration'   => 'CL_Education_Bubble',
				'illustration' => 'CL_Education',
				'sort_order' => 2,
				),
			'inclusion' => array(
				'name'     => 'Inclusion',
				'colour'    => 'yellow-cl',
				'bg-colour' => 'yellow-bg-cl',
				'decoration'   => 'CL_Inclusion_Bubble',
				'illustration' => 'CL_Inclusion',
				'sort_order' => 1,
				),
			'urban-transformation' => array(
				'name' => 'Urban Transformation',
				'colour'    => 'green-cl',
				'bg-colour' => 'green-bg-cl',
				'decoration'   => 'CL_Urban_Transformation_Bubble',
				'illustration'   => 'CL_Urban_Transformation',
				'sort_order' => 3,
				),
		),
		'display_priority_story' => array( 'lab','topic','location','discipline','resource' ),
		'display_priority_participant' => array( 'discipline','location' ),
		'post-type-archive-exlusive' => array( 'discipline' ),
		//'display_priority_collaboration' => array( 'topic','location','discipline','methodology','project_output' ),
		// Maximum number of tags on grid items
		'grid_tax_max' => 2,
		'single_tax_max' => 10,
		'collaboration_tax_max' => 20,
	),
	'PATTERNS' => array(
		'decoration_taxonomy' => 'labs'
	),
	'POST_TYPES' => array(
		'available-for-form-updates' => array( 'collaboration', 'participant' ),
		'participant_archive_posts_per_page' => 100,
		'related-content' => array( 'story','participant' ),
		//'related-content' => array( 'story', 'collaboration', 'programme_round', 'page' ),
	),
	'BREADCRUMBS' => array(
		'max-chars-story' => 85,
		'max-chars-collaboration' => 65,
		'max-chars-default' => 75,
	),
);

/*
* Source: http://support.advancedcustomfields.com/forums/topic/customise-color-picker-swatches/
*/

// Adds client's custom colors to WYSIWYG editor and ACF color picker.

if ( empty( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOUR_PICKERS']['bg'] ) ) {
  if ( !empty ( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS'] ) ) {
      $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOUR_PICKERS']['bg'] = array(
        $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['pink-cl'],
        $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['sandbox-cl'],
        $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['white'],
      );
  }
}

if ( empty( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOUR_PICKERS']['accents'] ) ) {
  if ( !empty( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS'] ) ) {
      $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOUR_PICKERS']['accents'] = array(
        $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['pink-cl'],
        $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['yellow-cl'],
		$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['orange-cl'],
		$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['blue-cl'],
		$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['purple-cl'],
		$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['green-cl'],
      );
  }
}

if ( empty( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOUR_PICKERS']['boxes'] ) ) {
  if ( !empty( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS'] ) ) {
      $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOUR_PICKERS']['boxes'] = array(
      	$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['white'],
      	$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['pink-cl'],
      	$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['pink-bg-cl'],
		$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['yellow-bg-cl'],
		$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['orange-bg-cl'],
		$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['blue-bg-cl'],
		$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['purple-bg-cl'],
		$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['COLOURS']['green-bg-cl'],
      );
  }
}

if ( empty( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['GRAVITY_FORMS']['fields'] ) ) {
	$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['GRAVITY_FORMS']['fields'] = array(
		'collaboration-gallery' => 23,
		'collaboration-documents' => 24,
		'story-images' => 11,
		'story-title' => 1,
	);
}

if ( empty( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['ACF']['fields'] ) ) {
	$GLOBALS['EXCHANGE_PLUGIN_CONFIG']['ACF']['fields'] = array(
		'collaboration-gallery' => 'field_577e3c937d7d6',
		'collaboration-participants' => 'field_56b9b7c755a9f',
		'collaboration-documents' => 'field_57e6561ec9866',
		'collaboration-oembed' => 'field_57e9090e9b7da',
		'collaboration-update-link' => 'field_57a0a397c1cd6',
		'participant-update-link' => 'field_57a0a3eff2d3c',
	);
}