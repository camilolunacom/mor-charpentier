<article <?php post_class( 'grid__item' ); ?>>

	<?php if ( has_post_thumbnail() ) {

		$bg = get_the_post_thumbnail_url( get_the_ID(), 'news-grid' );

	} else {

		$bg = get_template_directory_uri() . '/assets/img/placeholder.svg';

	} ?>

	<div class="grid__container" style="background-image: url('<?php echo esc_url( $bg ); ?>');">

		<a class="grid__link" href="<?php echo esc_url( get_the_permalink() ); ?>">

			<div class="grid__overlay"></div>

			<div class="grid__content">

				<header class="grid__header">

					<?php the_title( '<h2 class="grid__title">', '</h2>'); ?>

				</header>

				<button class="grid__button grid__button--line btn btn--small" href="<?php echo the_permalink(); ?>">

					<?php _e( 'View', 'mc2020' ); 
					echo ' ' . esc_html( get_post_type() ); ?>

				</button>

			</div>

		</a>

	</div>

</article>
