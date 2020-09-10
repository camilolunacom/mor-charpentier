<?php get_header(); ?>

<main <?php post_class( 'site-main' ); ?> role="main">

	<section class="mc-section">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'includes/content', 'page' ); ?>

		<?php endwhile; endif; ?>

	</section>

</main>

<?php get_footer(); ?>
