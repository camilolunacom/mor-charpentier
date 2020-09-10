<?php get_header(); ?>

<main <?php post_class( 'site-main about' ); ?> role="main">

	<section class="mc-section">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'includes/content-page', 'about' ); ?>

		<?php endwhile; endif; ?>

	</section>

	<section class="mc-section section--cuarter-padding about__contact">

		<div class="about__contact-part"><?php the_field( 'address_field_1' ); ?></div>

		<div class="about__contact-part"><?php the_field( 'address_field_2' ); ?></div>

		<div class="about__contact-part"><?php the_field( 'address_field_3' ); ?></div>

		<div class="about__contact-part">
			<a href="tel:+<?php the_field( 'phone' ); ?>"><?php the_field( 'phone_display' ); ?></a>
		</div>

		<div class="about__contact-part">
			<a href="mailto:<?php the_field( 'contact_email', 1754 ); ?>"><?php the_field( 'contact_email_display', 1754 ); ?></a>
		</div>

	</div>

	<section class="mc-section section--full-width section--no-padding-top">

		<div id="map-canvas"></div>

	</section>

</main>

<?php get_footer(); ?>
