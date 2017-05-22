<?php
/**
 * Participant Loop Template
 * Author: Willem Prins | SOMTIJDS
 * Project: CitizensLab
 * Date created: 21/05/2017
 *
 * @package Exchange Child Theme II: Citizenslab
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
};

$exchange = new Participant( $post );
?>

<?php include_once( get_stylesheet_directory() . '/parts/nav-breadcrumbs-bar.php' ); ?>

<main id="main" role="main" data-scroll="main">

	<div class="main-inner">

		<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/Article">

			<div class="participant__main">

				<div class="participant__main-inner--image">

					<?php if ( $exchange->has_featured_image ) : ?>
						
						<?php $exchange->publish_featured_image(); ?>

					 <?php else : ?>

					 	<img src="<?php echo esc_url( exchange_cl_get_random_bubble_image() ); ?>" alt="<?php _e( 'This CitizensLab Member does not have a profile image yet','exchange' ); ?>" width="200" height="auto" />

				 	<?php endif; ?>

				 </div>

 				<div class="participant__main-inner--info">

					<header class="article-header participant__header">

						<div class="participant__title-wrapper">

							<h1 class="entry-title participant__title" itemprop="headline"><?php the_title(); ?> <span class=""></span></h1>

						</div>

					</header> <!-- end .story__header -->

					<?php include_once( get_stylesheet_directory() . '/parts/content-participant-details.php' ); ?>
		 
				</div>

			</div>

		</article> <!-- end article -->

	<?php if ( $exchange->has_gallery ) : ?>

		<?php include_once( get_stylesheet_directory() .'/parts/content-story-modal.php' ); ?>

	<?php endif; ?>

	</div><!-- end .main-inner -->

</main> <!-- end #main -->
