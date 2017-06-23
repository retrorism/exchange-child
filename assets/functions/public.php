<?php
/**
 * CitizensLab template functions
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
};

/**
 * Create link (or simply an opening tag)
 *
 * @param $object mixed Exchange object, term or ID
 * @param bool @with_text Optional. Add object title as link text, or simply open tag.

 * @return string Anchor tag with appropriate attributes and / or title.
 */
function exchange_cl_create_link( $obj, $with_text = true, $class = '' ) {
	// Turn post_id into object
	if ( is_numeric( $obj ) && exchange_post_exists( $obj ) ) {
		$obj = BaseController::exchange_factory( $obj );
	}
	if ( $obj instanceof WP_Post ) {
		$obj = BaseController::exchange_factory( $obj );
	}
	if ( $obj instanceof Exchange ) {
		$url = $obj->link;
		$title = $obj->title;
	} elseif ( $obj instanceof WP_Term ) {
		$url = get_term_link( $obj );
		$title = $obj->name;
	}
	$label = __( 'Read full story', 'exchange' );
	if ( 'participant' === $obj->type ) {
		$label = __( 'Go to members page', 'exchange' );
	}
	if ( ! empty( $url ) && ! empty( $title ) ) {
		$output  = '<a class="' . $class . '" href="' . $url . '" title="' .sprintf( esc_html__( 'Navigate to %s', EXCHANGE_PLUGIN ), esc_attr( $title ) ).'">';
		if ( $with_text ) {
			$output .= $label . '</a>';
		}
		return $output;
	} else {
		return false;
	}
}

/**
 * Build social buttons.
 *
 * @param string $context Context for the buttons.
 * @return return HTML string with social buttons
 */

function exchange_cl_build_social_icons( $context = '', $platforms = array(), $exchange = null ) {
	if ( empty( $platforms ) ) {
		return;
	}
	$site_url = get_bloginfo( 'url' );
	$site_name = get_bloginfo( 'name' );
	$encoded_url = urlencode( $site_url );
	$encoded_name = urlencode( $site_name );
	$share_buttons = ! empty( $exchange ) && $exchange instanceof Exchange;

	if ( $share_buttons ) {
		$encoded_link = urlencode( $exchange->link );
		$email_share_subject_option = get_option( 'options_email_share_subject' );
		$email_share_text_option = get_option( 'options_email_share_text' );
		$email_share_subject = $email_share_subject_option
			? rawurlencode( sprintf( $email_share_subject_option, $site_name, $exchange->title ) )
			: rawurlencode( sprintf( '%s: %s', $site_name, $exchange->title ) );
		$email_share_text = $email_share_text_option
			? rawurlencode( sprintf( $email_share_text_option, $exchange->type, $site_name, $exchange->title ) )
			: rawurlencode( sprintf( "Hi!\n\nThis %s on %s might interest you: %s\n\n", $exchange->type, $site_name, $exchange->title ) );
		$facebook_icon = '';
		$facebook_appid = get_option( 'options_facebook_app_id' );

		if ( ! empty( $facebook_appid ) ) {
			$facebook_link = 'https://facebook.com/dialog/share?app_id=' . $facebook_appid. '&display=popup&href=' . $encoded_link . '&redirect_uri=' .$encoded_url;
		} else {
			$facebook_link = 'http://www.facebook.com/sharer.php?u=' . $encoded_link;
		}
	}

	$facebook_page_url = get_option( 'options_facebook_page_url' );
	$twitter_url = get_option( 'options_twitter_url' );

	if ( $share_buttons ) {
		$link_titles = array(
			'twitter'  => __( 'Share this %s on Twitter', EXCHANGE_PLUGIN ),
			'facebook' => __( 'Share this %s on Facebook', EXCHANGE_PLUGIN ),
			'email'    => __( 'Share this %s in an e-mail', EXCHANGE_PLUGIN ),
			'print'    => __( 'Open a printer-friendly version of this %s', EXCHANGE_PLUGIN ),
		);
		$button_links = array(
			'twitter'  => 'https://twitter.com/intent/tweet?text=' . urlencode( sprintf( __( '%s: %s', EXCHANGE_PLUGIN ), $site_name, $exchange->title ) ) . '&url=' . $encoded_link,
			'facebook' => $facebook_link,
			'email'    => 'mailto:?subject=' . $email_share_subject . '&body=' . $email_share_text . '%0D%0A%0D%0A' . $encoded_link,
			'print'    => $exchange->link . '?exchange_display=print',
		);
	} else {
		$link_titles = array(
			'facebook'  => __( 'Connect with us on Facebook', EXCHANGE_PLUGIN ),
			'twitter'   => __( 'Follow us on Twitter', EXCHANGE_PLUGIN ),
		);
		$button_links = array(
			'facebook'  => ! empty( $facebook_page_url ) ? esc_url( $facebook_page_url ) : 'https://www.facebook.com/CitizensLab',
			'twitter'   => ! empty( $twitter_url ) ? esc_url( $twitter_url ) : 'https://www.twitter.com/CitizensLab',
		);
	}

	$button_svgs = array(
		'twitter' => exchange_build_svg( get_stylesheet_directory() . '/assets/images/svg/CL_Twitter_box.svg', true ),
		'facebook' => exchange_build_svg( get_stylesheet_directory() . '/assets/images/svg/CL_Facebook_box.svg', true ),
		'email' => exchange_build_svg( get_stylesheet_directory() . '/assets/images/svg/CL_Email_box.svg', true ),
	);

	$output = '<ul class="social-icons-list">';
	foreach ( $platforms as $platform ) {
		$button_label =  'page__footer' === $context ? '<span class="show-for-sr">' . $platform . '</span>' : '';

		$output .= '<li class="social-icons-list__item"><a class="social-icons-list__link link--' . $platform;
		if ( $share_buttons ) {
			$output .= '" title="' . sprintf( $link_titles[ $platform ], $exchange->type );
		} else {
			$output .= '" title="' . $link_titles[ $platform ];
		}
		$output .= '" target="_blank" href="' . $button_links[ $platform ] . '"><i class="social-icons-list__link__icon">'
				. $button_svgs[ $platform ] . '</i>' . $button_label . '</a></li>';
	}
	$output .= '</ul>';
	return $output;
}

function exchange_cl_build_participant_social_icons( $p ) {
	if ( ! $p instanceof Participant ) {
		return;
	}
	$social_media_arr = array( 
		'Facebook'   => 'facebook',
		'Twitter'    => 'twitter',
		'Linkedin'   => 'linkedin',
		'Googleplus' => 'google',
	);
	$output = '<ul class="participant__details__social-icons social-icons-list">';
	foreach( $social_media_arr as $pretty => $slug ) {
		if ( empty( $p->details['participant_' . $slug . '_profile_url'] ) ) {
			continue;
		}
		$output .= '<li class="participant__details__social-icon social-icons-list__item"><a href="';
		$output .= $p->details['participant_' . $slug . '_profile_url'] .'" ';
		$output .= 'title="' . wp_sprintf( __('Navigate to the %s page of %s', 'exchange'), $pretty, $p->title ) . '"';
		$output .= '><i class="social-icons-list__link__icon">' . exchange_build_svg( get_stylesheet_directory() . '/assets/images/svg/CL_' . $pretty . '_box.svg', true ) . '</i></a></li>';
	}
	return $output;
}

function exchange_cl_create_griditem_from_post( $obj, $context ) {
	$item = BaseController::exchange_factory( $obj, 'griditem' );
	if ( ! $item instanceof Exchange ) {
		return;
	}
    $griditem = new Griditem( $item, $context );
    if ( $griditem instanceof Griditem ) {
		return $griditem;
	}
}

function exchange_cl_create_lab_circle() {
	global $post;
	$img_root = get_stylesheet_directory_uri() . '/assets/images/png/';
	$all_pages = BaseController::get_all_from_type( 'page' );
	$labs = get_page_children( $post->ID, $all_pages );
	$lab_config = $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['TAXONOMIES']['labs'];
	$lab_circle = array();
	foreach ( $labs as $page_obj ) {
		$anchor = '<a href="#">';
		if ( ! $page_obj instanceof WP_Post || 'publish' !== $page_obj->post_status ) {
			continue;
		}
		$anchor = exchange_create_link( BaseController::exchange_factory( $page_obj ), false );
		if ( ! array_key_exists( $page_obj->post_name, $lab_config) ) {
			continue;
		}
			
		$illustration = $lab_config[ $page_obj->post_name ]['illustration'];
		$sort_order = $lab_config[ $page_obj->post_name ]['sort_order'];
		$alttext = $lab_config[ $page_obj->post_name ]['name'];

		$lab_circle[ $sort_order ]['logo'] = $anchor . '<img src="' . $img_root . $illustration . '_alpha_small.png" alt="' . $alttext . '"></a>';

		$item = exchange_cl_create_griditem_from_post( $page_obj, 'featuredgrid' );
		if ( ! $item ) {
			continue;
		}
		$lab_circle[ $sort_order ]['griditem'] = $item;
	}
	if ( count( $lab_circle ) === count( $lab_config ) ) {
		return $lab_circle;
	}
}

function exchange_cl_get_random_bubble_image() {
	if ( ! isset( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['TAXONOMIES']['labs'] ) ) {
		return;
	}
	$keys = array_keys( $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['TAXONOMIES']['labs'] );
	$rand = rand( 0, count( $keys ) - 1 );
	$color_me_wild = $GLOBALS['EXCHANGE_PLUGIN_CONFIG']['TAXONOMIES']['labs'][$keys[$rand]]['decoration'];
	$src = get_stylesheet_directory_uri() . '/assets/images/png/' . $color_me_wild . '_simple.png';
	if ( ! empty( $color_me_wild ) ) {
		return $src;
	}
}

function exchange_cl_breadcrumb_type( $type, $exchange, $divider ) {
	if ( 'story' !== $exchange->type ) {
		return $type;
	}
	if ( ! empty( $exchange->category) && in_array( $exchange->category->name, array( 'Prototype', 'Resource' ), true ) ) {
		$parent_link = get_the_permalink( get_page_by_title('Labs') );
		$type_string = 'Labs';
		$type = '<li><a href="' . $parent_link . '">' . $type_string . '</a></li>' . $divider;
	}
	if ( ! empty( $exchange->ordered_tag_list ) ) {
		foreach ( $exchange->ordered_tag_list as $term ) {
			if ( 'lab' !== $term->taxonomy ) {
				continue;
			}
			$lab_parent = get_page_by_title( $term->name );
			if ( empty( $lab_parent ) || ! $lab_parent instanceof WP_Post ) {
				continue;
			}
			$lab_parent_link = get_the_permalink( $lab_parent );
			$type .= '<li><a href="' . $lab_parent_link . '">' . $term->name . '</a></li>' . $divider;
			// Prevent any further lab tags from being added.
			return $type;
		}
	}
	return $type;
}
add_filter( 'exchange_breadcrumb_type','exchange_cl_breadcrumb_type', 10, 3 );

function exchange_cl_breadcrumb_title( $title, $exchange, $divider ) {
	if ( 'story' !== $exchange->type ) {
		return $title;
	}
	if ( in_array( $exchange->category->name, array( 'Prototype', 'Resource' ), true ) ) {
		$title = str_replace( '<li>', '<li>' . $exchange->category->name . ': ', $title );
	}
	return $title;
}
add_filter( 'exchange_breadcrumb_title','exchange_cl_breadcrumb_title', 10, 3 );

function exchange_cl_section_border( $svg, $pos, $colour ) {
if ( empty( $colour ) || false === strpos( $colour, '#' ) ) {
			return;
		}
		switch ( $pos ) {
			case 'top' :
				$svg = '<svg xmlns="http://www.w3.org/2000/svg" class="section__edge--top" viewBox="0 0 840 20" preserveAspectRatio="none"><path fill="' . $colour . '" d="M445.6 9.4L478 9l25.4 3.4L527 10l21 .3 24.5-1.7 24.6 3 37 .4 26-.7 27 1.7 24-2 24.4.2L752 10l26 1 29.4 1.5L840 9v11.3L0 20v-7h46l29-.3 26.6-2L128 10l32.2-2 20.4 5h28l29.2-1.8 26.5.7 28.4 2 30-4 28-1.7L372 12l25.6.5 28.4.5z"/></svg>';
				break;
			case 'bottom' :
				$svg = '<svg xmlns="http://www.w3.org/2000/svg" class="section__edge--bottom" viewBox="0 0 840 20" preserveAspectRatio="none"><path fill="' . $colour . '" d="M451 7l42.8 3 26.56-1.98L544 8l16.8 1 24.85-1.6 31.04 1.4L650 9l26 1 25.04-1.52 23.5.13 21.7-1.27 22.3 2.55 32.4-2.34L839.5 10l.5-9.27L0 0v9.26L46 7l29.05.28 27.9.48L128 10l28-2 24.6-1h28.1l29.08 1.8 26.5-.73 30.12 3.16 28.28-1.47 27.62-.94 26.02 2.26 21.32-3.56L426 7z"/></svg>';
				break;
			default:
				return;
		}
		return $svg;
}
add_filter( 'exchange_section_border','exchange_cl_section_border', 10, 3 );

