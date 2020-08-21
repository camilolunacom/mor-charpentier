<article <?php body_class( 'single' ); ?>>

	<div class="single__container">

		<div class="single__img">

			<?php echo get_the_post_thumbnail( get_the_ID(), 'news' ); ?>

			<div class="single__overlay">
				<a class="single__button btn" href="<?php echo the_permalink(); ?>">
					<?php _e( 'View more', 'mc2020' ); ?>
				</a>
			</div>

		</div>

		<header class="entry-header">

		<?php the_title( '<h2 class="single__title"><a class="single__link" href="' . esc_url( get_the_permalink() ) . '">', '</a></h2>'); ?>

		</header>

		<div class="single__content">

			<?php the_excerpt(); ?>

		</div>

	</div>

</article>
