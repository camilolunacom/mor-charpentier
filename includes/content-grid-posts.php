<article <?php post_class( 'grid__item' ); ?>>

	<?php if ( has_post_thumbnail() ) {

		$bg = get_the_post_thumbnail_url( get_the_ID(), 'news-grid' );

	} else {

		$bg = get_template_directory_uri() . '/assets/img/placeholder.svg';

	} ?>

	<div class="grid__container" style="background-image: url('<?php echo esc_url( $bg ); ?>');">

		<div class="grid__overlay">
			<a class="grid__button btn" href="<?php echo the_permalink(); ?>">
				<?php _e( 'View more', 'mc2020' ); ?>
			</a>
		</div>

	</div>

	<header class="grid__header">

		<?php the_title( '<h2 class="grid__title"><a class="grid__link" href="' . esc_url( get_the_permalink() ) . '">', '</a></h2>'); ?>

	</header>

	<div class="grid__excerpt">

		<?php the_excerpt(); ?>

	</div>

</article>
