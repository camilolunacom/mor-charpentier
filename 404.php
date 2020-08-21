<?php get_header(); ?>

<main class="site-main" role="main">

	<section class="section">

		<article <?php post_class(); ?>>

			<div class="error404__container">

				<header class="error404__header">

					<p class="error404__404">404</p>

					<h1 class="error404__title section__title">
						<?php esc_html_e( 'No content found', 'mc2020'); ?>
					</h1>

				</header>

				<div class="error404__content">

					<p><?php esc_html_e( "Nothing was found at this location.", 'mc2020'); ?><br><?php esc_html_e( "Try using the main menu above.", 'mc2020'); ?></p>

				</div>

				<div class="error404__btn">

					<a class="btn" href="<?php echo esc_url( home_url( '/') ); ?>" role="home">
						<?php esc_html_e( 'Go to home', 'mc2020'); ?>
					</a>

				</p>

			</div>

		</article>

	</section>

</main>

<?php get_footer(); ?>
