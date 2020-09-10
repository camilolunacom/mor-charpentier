<?php get_header(); ?>

<main class="<?php post_class( 'site-main' ); ?>" role="main">

	<section class="mc-section">

	<?php if ( is_archive() ) : ?>

		<h1 class="mc-section__title">
			<?php if ( is_page() || is_singular() ) {
				single_post_title();
			} else if ( is_category() || is_tag() ) {
				single_term_title();
			} else {
				wp_title( '' );
			}
		?>
		</h1>

	<?php endif; ?>

		<div class="site-main-content">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'includes/content' ); ?>

			<?php endwhile; else: ?>

				<?php get_template_part( 'includes/content', 'none' ); ?>

			<?php endif; ?>

		</div>

	</section>

</main>

<?php get_footer(); ?>
