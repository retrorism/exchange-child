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
	if ( $obj instanceof Exchange ) {
		$url = $obj->link;
		$title = $obj->title;
	} elseif ( $obj instanceof WP_Term ) {
		$url = get_term_link( $obj );
		$title = $obj->name;
	}
	$label = __( 'Read full story', 'exchange' );
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
	$png_base = get_stylesheet_directory_uri() . '/assets/images/png/T_icon' . $circle_fallback;

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


