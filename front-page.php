<?php global $header_tone; ?>
<?php $header_tone = get_field( 'header_tone' ); ?>
<?php get_header(); ?>

<?php
$hero_height = get_field( 'hero_height' );
$background_color = get_field( 'background_color' );
$autoplay_speed = get_field( 'autoplay_speed' );
$autoplay_speed_miliseconds = $autoplay_speed > 0 ? $autoplay_speed * 1000 : 0;
?>

<main <?php post_class( 'site-main' ); ?> role="main">

	<!-- Hero slider -->
	<section class="hero">

		<div class="hero-slider<?php if ( $header_tone ) : ?> hero-slider--light<?php endif; ?>"<?php if( $autoplay_speed_miliseconds ) : ?> data-slick='{"autoplay": true, "autoplaySpeed": <?php echo $autoplay_speed_miliseconds; ?>}'" <?php endif; ?><?php if ( $background_color ) : ?>style="background-color: <?php echo $background_color ?>"<?php endif; ?>>

			<?php if ( have_rows( 'slider' ) ) : while ( have_rows( 'slider' ) ) : the_row(); ?>

				<?php
				$background = get_sub_field( 'background' );
				$title = get_sub_field( 'title' );
				$text = get_sub_field( 'text' );
				$button = get_sub_field( 'button' );
				$button_text = get_sub_field( 'button_text' );
				$button_url = get_sub_field( 'button_url' );
				$overlay_color = get_sub_field( 'overlay_color' );
				$overlay_opacity = get_sub_field( 'overlay_opacity' );
				$overlay_opacity_decimal = $overlay_opacity > 0 ? $overlay_opacity / 100 : 0;
				$text_color = get_sub_field( 'text_color' );
				$background_size = get_sub_field( 'background_size' );
				?>

				<div class="hero-slider__slide<?php if ( $text_color ) :?> hero-slider__slide--light<?php endif; ?><?php if ( $background_size ) :?> hero-slider__slide--cover<?php endif; ?>""<?php if ( $background ) : ?> style="background-image: url(<?php echo $background; ?>);<?php endif; ?>">

					<div class="hero-slider__overlay" style="<?php if ( $overlay_color ) : ?>background-color: <?php echo $overlay_color; ?>; <?php endif; ?><?php if ( $overlay_opacity ) : ?>opacity: <?php echo $overlay_opacity_decimal; ?>; <?php endif; ?>"></div>

					<div class="hero-slider__content"<?php if ( $hero_height ) : ?> style="min-height: calc(<?php echo $hero_height; ?>vh - 20px);"<?php endif; ?>>

						<?php if ( $title ) : ?><h2 class="hero-slider__title"><?php echo $title; ?></h2><?php endif; ?>

						<?php if ( $text ) : ?><div class="hero-slider__text"><?php echo $text; ?></div><?php endif; ?>

						<?php if ( $button ) : ?>
							<a class="hero-slider__button btn" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
						<?php endif; ?>

					</div>

				</div>

			<?php endwhile; else : ?>

				<li class="hero-slider__slide">
          <div class="hero-slider__content" style="min-height: calc(100vh - 20px);">
            <h2 class="hero-slider__title"><?php _e( 'mor charpentier', 'mc2020' ); ?></h2>
          </div>
        </li>

			<?php endif; ?>

			</div>

		</div>

	</section>

	<!-- Latest news -->
	<section class="mc-section mc-section--no-padding-bottom">

		<h2 class="mc-section__title"><?php _e('Latest News', 'mc2020'); ?></h2>

		<div class="grid grid--posts">

		<?php
		$recent_posts = new WP_Query([
			'post_type' => 'post',
			'posts_per_page' => 3
		]);

		if ( $recent_posts->have_posts() ) :
			while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
			?>

			<?php get_template_part( 'includes/content-grid', 'posts' ); ?>

			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

		</div>

	</section>

</main>

<?php get_footer(); ?>
