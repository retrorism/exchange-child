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
			<?php
				$hide_title_class = '';
				if ( 'Labs' !== $exchange->title ) {
					$programmes = get_page_by_title( 'Labs' );
					global $post;
					if ( isset( $post ) && $post->post_parent === $programmes->ID ) {
						get_template_part( 'parts/content', 'page-programme' );
						$hide_title_class = ' show-for-sr';
					};
				}; ?>
			<h1 class="entry-title story__title<?php echo $hide_title_class; ?>" itemprop="headline"><?php echo $exchange->title; ?></h1>

		</div>

		<?php if ( $exchange->has_editorial_intro ) {
			$exchange->publish_intro();
		} ?>

		<?php
			if ( $exchange->title === 'Labs' ) {
				get_template_part( 'parts/content', 'page-labs' );
			} ?>

	</div>

</header> <!-- end .story__header -->
