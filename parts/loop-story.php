<?php
/**
 * Story Loop Template
 * Author: Willem Prins | SOMTIJDS
 * Project: Tandem
 * Date created: 10/04/2016
 *
 * @package Exchange Plugin
 **/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
};

$exchange = new Story( $post );
?>

<?php include_once( get_stylesheet_directory() . '/parts/nav-breadcrumbs-bar.php' ); ?>

<main id="main" role="main" data-scroll="main">

	<div class="main-inner">

		<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/Article">

			<header class="article-header story__header">

				<?php if ( $exchange->has_header_image ) {
					$exchange->publish_header_image();
				 } ?>

				<div class="story__header__introduction">

					<div class="story__title-wrapper">

						<h1 class="entry-title story__title" itemprop="headline"><?php the_title(); ?></h1>

					</div>

					<?php include_once( get_stylesheet_directory() . '/parts/content-story-meta.php' ); ?>

					<?php if ( $exchange->has_editorial_intro ) {
						$exchange->publish_intro();
					} ?>

				</div>


			</header> <!-- end .story__header -->

			<div class="entry-content story__content" itemprop="articleBody">

				<?php
				// Loop through sections.
				$exchange->publish_sections();
				?>

			</div> <!-- end story__content -->

			<?php include_once( get_stylesheet_directory() . '/parts/content-story-footer.php' ); ?>

		</article> <!-- end article -->

	<?php if ( is_singular('story') && ! empty( $exchange->storyteller ) ) : ?>

		<aside class="story__section section--storyteller">

			<div class="section-inner">

				<?php $exchange->publish_contact_card( $exchange->type ); ?>

			</div><!-- section-inner-->

		</aside>

	<?php endif; ?>

		<div class="story__relatedcontent story__section section--relatedcontent section--has_grid section--sandbox section--coloured">

			<div class="section-inner">

			<?php $exchange->publish_related_content( $exchange->type . '__relatedcontent' ); ?>

			</div>

		</div><!-- related-content -->

	</div><!-- end .main-inner -->

</main> <!-- end #main -->

<?php if ( is_singular( 'story' ) ) : ?>

	<section class="article-share-cta story__section section--white section--coloured">

		<?php echo BasePattern::build_edge_svg('top', exchange_slug_to_hex( 'white' ) ); ?>

		<div class="section-inner">

			<?php get_template_part( 'parts/content','story-share-cta' ); ?>

		</div>

	</section>

<?php endif; ?>

<?php if ( $exchange->has_gallery ) : ?>

	<?php include_once( get_stylesheet_directory() .'/parts/content-story-modal.php' ); ?>

<?php endif; ?>
