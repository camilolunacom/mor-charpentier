<?php get_header(); ?>

<main class="'site-main" role="main">

	<section class="mc-section section--no-padding-bottom">

		<h1 class="mc-section__title">
			<?php single_term_title(); ?>
		</h1>

		<div class="filters">

			<button class="filters__btn"><?php esc_html_e( 'Show filters', 'mc2020' ); ?></button>

			<ul class="filters__list">
				<?php wp_list_categories( array(
					'title_li' => '',
				) ); ?>
			</ul>

		</div>

		<div class="grid grid--posts">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'includes/content-grid', 'posts' ); ?>

			<?php endwhile; else: ?>

				<?php get_template_part( 'includes/content', 'none' ); ?>

			<?php endif; ?>

			</div>

		</section>

	</main>

	<section class="mc-section section--no-padding-top section--no-padding-bottom">

		<div class="pagination">
			<?php echo paginate_links(); ?>
		</div>

	</section>

	<section class="mc-section">

		<?php get_template_part( 'includes/newsletter-form' ); ?>

	</section>

<?php get_footer(); ?>
