<article <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( '<h1 class="mc-section__title">', '</h1>'); ?>

	</header>

	<div class="entry-content cols">

		<?php $images = get_field( 'image_gallery' ); ?>

		<?php if ( $images ) : ?>

			<div class="col-half">

				<div class="slick">

					<div class="slick__slides">

					<?php foreach( $images as $image_id ): ?>

						<div class="slick__slide">

							<?php echo wp_get_attachment_image( $image_id, 'news' ); ?>

						</div>

					<?php endforeach; ?>

					</div>

				</div>

			</div>

		<?php endif; ?>

		<div class="col-half">

			<?php the_content(); ?>

			<div class="about__schedule">

				<div class="about__schedule-title title-line">
					<?php _e( 'Open', 'mc2020' ); ?>
				</div>

				<div class="about__schedule-content">
					<?php the_field( 'schedule' ); ?>
				</div>

			</div>

		</div>

	</div>

</article>
