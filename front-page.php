<?php get_header(); ?>

<main <?php post_class( 'site-main' ); ?> role="main">

	<!-- Hero slider -->
	<section class="hero">
		<div class="glide">
		<div class="glide__track" data-glide-el="track">
			<ul class="glide__slides">

			<?php

			if ( have_rows('slider') ) :

			while ( have_rows('slider') ) : the_row();
				$background = get_sub_field( 'background' );
				$title = get_sub_field( 'title' );
				$text = get_sub_field( 'text' );
				$button_text = get_sub_field( 'button_text' );
				$button_url = get_sub_field( 'button_url' );

				?>

				<li class="glide__slide"<?php if ( $background ) : ?> style="background-image: url(<?php echo $background; ?>)"<?php endif; ?>>
				<div class="glide__overlay"></div>

				<div class="glide__content">

					<?php if ( $title ) : ?><h2 class="glide__title"><?php echo $title; ?></h2><?php endif; ?>

					<?php if ( $text ) : ?><div class="glide__text"><?php echo $text; ?></div><?php endif; ?>

					<?php if ( $button_text ) : ?><a class="glide__button btn btn--alt" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a><?php endif; ?>

				</div>

				</li>

			<?php endwhile; ?>
			<?php else : ?>

			<li class="glide__slide">
				<h2 class="glide__title"><?php _e( 'mor charpentier', 'mc2020' ); ?></h2>
			</li>

			<?php endif; ?>

			</ul>
		</div>

		<div class="glide__arrows" data-glide-el="controls">
			<button class="glide__arrow glide__arrow--left" data-glide-dir="<">
			<svg class="slider-arrow" viewBox="0 0 200 330">
				<use xlink:href="#arrow-left"></use>
			</svg>
			</button>
			<button class="glide__arrow glide__arrow--right" data-glide-dir=">">
			<svg class="slider-arrow" viewBox="0 0 200 330">
				<use xlink:href="#arrow-right"></use>
			</svg>
			</button>
		</div>

		</div>

	</section>

	<!-- Latest news -->
	<section class="section">

		<h2 class="section__title"><?php _e('Latest News', 'mc2020'); ?></h2>

		<div class="news">

		<?php
		$recent_posts = new WP_Query([
			'post_type' => 'post',
			'posts_per_page' => 3
		]);

		if ( $recent_posts->have_posts() ) :
			while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
			?>

			<?php get_template_part( 'includes/content' ); ?>

			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

		</div>

	</section>

</main>

<?php get_footer(); ?>
