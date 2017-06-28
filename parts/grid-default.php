<div class="griditem__content griditem__content--<?php echo $exchange->type; ?>" <?php if ( is_page('labs') ) : ?>data-equalizer-watch<?php endif; ?>>
	<div class="griditem__content-border">
		<!-- IMAGE -->
		<?php echo exchange_create_link( $exchange, false ); ?>
			<?php $exchange->publish_featured_image('griditem'); ?>
		</a>

		<!-- META -->
		<?php /*  */ ?>
		<div class="griditem__content-inner">
			<!-- CATEGORY -->
			<?php if ( ! empty( $exchange->category ) ) : ?>
				<?php $exchange->publish_category( 'griditem'); ?>
			<?php endif; ?>		

			<!-- TAGS -->
			<?php if ( $exchange->has_tags ) : ?>
				<div class='griditem__tags'><?php $exchange->publish_tags('griditem'); ?></div>
			<?php endif; ?>

			<!-- TITLE -->
			<?php echo exchange_create_link( $exchange, false ); ?>
				<h4 class="griditem__title"><?php echo $exchange->title; ?></h4>
			</a>
			
			<div class='griditem__meta'>
			<!-- STORYTELLER -->
			<?php if ( ! empty( $exchange->storyteller ) ) : ?>
				<div class="griditem__meta__storytellers">
					<ul>
					<?php foreach ( $exchange->storyteller as $s ) : ?>
						<li class="griditem__meta__storyteller"><?php echo esc_html( $s->name ); ?></li>
					<?php endforeach; ?>
					</ul>
				</div><span class="griditem__meta__divider">|</span> 
			<?php endif; ?>
			<span class="griditem__meta__date"><?php echo mysql2date('F jS, Y', $exchange->date ); ?></span>
			</div>

			<!-- INTRO / EXCERPT -->
			<?php if ( ! empty( $exchange->has_editorial_intro ) ) : ?>
				<div class='griditem__intro-wrapper'>
				<p><?php $exchange->editorial_intro->publish_stripped( 'griditem', 20 ); ?></p>
				</div>
			<?php endif; ?>

			<!-- READMORE -->
			<div class='griditem__read-full-story'>
				<?php echo exchange_cl_create_link( $exchange, true, '' ); ?>
			</div>
		</div>
	</div>
</div>
