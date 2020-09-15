<?php get_header(); ?>

<main class="site-main" role="main">

	<article <?php post_class( 'mc-section single' ); ?>>

		<header class="single__header">

			<h1 class="mc-section__title single__title">

				<?php if ( is_page() || is_singular() ) {
					single_post_title();
				} else {
					wp_title( '' );
				} ?>

			</h1>

			<div class="single__extra extra">

				<?php if ( 'artist' === get_post_type() ) {

					get_template_part( 'includes/content-single-extra', 'artist' );

				} elseif ( 'viewing-room' === get_post_type() ) {

					get_template_part( 'includes/content-single-extra', 'viewing-room' );

				} ?>

			</div>

		</header>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="single__content single-post">

				<?php get_template_part( 'includes/content-single', 'post' ); ?>

			</div>

		<?php else : ?>

			<div class="single__main">

				<?php get_template_part( 'includes/content-single' ); ?>

			</div>

			<?php endif; ?>

	</article>

	<?php if ( 'post' !== get_post_type() ) : ?>

		<aside class="mc-section mc-section--no-padding-top single__share">

			<?php get_template_part( 'includes/social-share' ); ?>

		</aside>

	<?php endif; ?>

</main>

<?php get_footer(); ?>
