<?php get_header(); ?>

<main <?php post_class( 'site-main' ); ?> role="main">

	<section class="section">

		<h1 class="section__title">
			<?php if ( is_page() ) {
			single_post_title();
			} else if ( is_category() || is_tag() ) {
			single_term_title();
			} else {
			wp_title( '' );
			}
		?>
		</h1>

		<?php if ( is_home() ) : ?>

			<div class="filters">

				<button class="filters__btn"><?php esc_html_e( 'Show filters', 'mc2020' ); ?></button>

				<ul class="filters__list">
					<?php wp_list_categories( array(
						'title_li' => '',
					) ); ?>
				</ul>

			</div>

		<?php endif; ?>

		<div class="news">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'includes/content' ); ?>

			<?php endwhile; else: ?>

				<?php get_template_part( 'includes/content', 'none' ); ?>

			<?php endif; ?>

			</div>

		</section>

	</main>

	<section class="section section--no-padding-top">

		<div class="pagination">
			<?php echo paginate_links(); ?>
		</div>

	</section>

	<section class="section section-no-padding-top">

		<?php get_template_part( 'includes/newsletter-form' ); ?>

	</section>

<?php get_footer(); ?>
