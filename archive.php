<?php get_header(); ?>

<main class="'site-main" role="main">

	<section class="mc-section">

		<h1 class="mc-section__title">
			<?php if ( is_page() || is_singular() ) {
				single_post_title();
			} else if ( is_category() || is_tag() ) {
				single_term_title();
			} else if ( is_post_type_archive() ) {
				post_type_archive_title();
			} else {
				wp_title( '' ) ;
			}
		?>
		</h1>

		<div class="grid">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'includes/content', 'grid' ); ?>

			<?php endwhile; else: ?>

				<?php get_template_part( 'includes/content', 'none' ); ?>

			<?php endif; ?>

		</div>

	</section>

	<section class="mc-section mc-section--no-padding-top mc-section--no-padding-bottom">

		<div class="pagination">
			<?php echo paginate_links(); ?>
		</div>

	</section>

</main>

<?php get_footer(); ?>
