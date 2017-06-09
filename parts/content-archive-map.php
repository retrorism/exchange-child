<?php if ( function_exists( 'facetwp_display' ) ) : ?>
	<nav class="archive__facets">
		<div class="archive__facets__type">
			<button class="archive__facets__type__reset"><?php _e('Show all','exchange'); ?></button>
			<?php echo facetwp_display( 'facet', 'member_type' ); ?>
		</div>
		<div class="archive__facets__country">
			<label class="archive__facets__country__label" for="member_country"><?php _e( 'Filter by expertise: ', 'exchange' ); ?></label>
			<?php echo facetwp_display( 'facet', 'member_country' ); ?>
		</div>
	</nav>
<?php endif; ?>
<div class="archive__map">

		<?php
			$map_input = array(
				'map_style' => 'dots',
				'map_size' => 'wide',
				'map_zoom_level' => '4',
			);
			$map = BasePattern::pattern_factory( $map_input, 'simple_map', 'archive__map', true );
			$map->publish();
		?>

</div>
