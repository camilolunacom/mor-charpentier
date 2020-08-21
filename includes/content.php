<article <?php post_class( 'grid-single' ); ?>>

	<div class="grid-single__container">

		<div class="grid-single__img">

			<?php echo get_the_post_thumbnail( get_the_ID(), 'news' ); ?>

			<div class="grid-single__overlay">
				<a class="grid-single__button btn" href="<?php echo the_permalink(); ?>">
					<?php _e( 'View more', 'mc2020' ); ?>
				</a>
			</div>

		</div>

		<header class="grid-single__header">

			<?php the_title( '<h2 class="grid-single__title"><a class="grid-single__link" href="' . esc_url( get_the_permalink() ) . '">', '</a></h2>'); ?>

		</header>

		<div class="grid-single__content">

			<?php the_excerpt(); ?>

		</div>

	</div>

</article>
