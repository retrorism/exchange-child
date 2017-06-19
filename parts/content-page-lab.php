<?php 
 /**
 * Labs Overview content part
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
?>

<?php include_once( get_stylesheet_directory() . '/parts/content-page-lab-grid.php' ); ?>

<?php include_once( get_stylesheet_directory() . '/parts/content-lab-prototype-pointer.php' ); ?>