<?php get_header(); ?>

<main <?php post_class( 'site-main' ); ?> role="main">

	<section class="section">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'includes/content-page', 'about' ); ?>

		<?php endwhile; endif; ?>

	</section>

	<section class="section section--full-width section--no-padding">
		<div id="map-canvas"></div>
	</section>

</main>

<?php get_footer(); ?>
