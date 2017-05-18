<?php
/**
 * Page Header Content Template
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
<header class="article-header story__header">

	<?php if ( $exchange->has_header_image ) {
		$exchange->publish_header_image('story__header');
	 } ?>

	<div class="story__header__introduction">

		<div class="story__title-wrapper">

			<h1 class="entry-title story__title" itemprop="headline"><?php echo $exchange->title; ?></h1>

		</div>

		<?php if ( $exchange->has_editorial_intro ) {
			$exchange->publish_intro();
		} ?>

	</div>

</header> <!-- end .story__header -->

<?php if ( $exchange->title === 'Labs' ) : ?>

	<?php get_template_part( 'parts/content', 'page-labs' ); ?>

<?php else : ?>

	<?php 
		global $post;
		if ( ! empty( $post->post_parent ) ) : ?>

		<?php $labs_page = get_page_by_title( 'Labs' );
			if ( $labs_page instanceof WP_Post && $post->post_parent === $labs_page->ID ) : ?>
			
				<?php get_template_part( 'parts/content', 'page-lab' ); ?>

			<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>