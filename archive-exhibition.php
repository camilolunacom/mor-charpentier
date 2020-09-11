<?php get_header(); ?>

<?php
$current = false;
$past = false;
$open = false;
$today = date( 'Ymd' );
$year = 0;
?>

<main class="'site-main" role="main">

	<section class="mc-section exhibition">

		<h1 class="mc-section__title">
			<?php post_type_archive_title(); ?>
		</h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php $end_date = get_field( 'end_date' );
			$end_year = substr( $end_date, 0, 4 );
			$start_date = get_field( 'start_date' );
			$start_year = substr( $start_date, 0, 4 );
			?>

			<?php if ( $end_date >= $today ) : ?>

				<?php if ( ! $current ) : ?>

					<div class="current-exhibitions">

						<h2 class="exhibition__type title-line"><?php _e( 'Current', 'mc2020' ); ?></h2>

					<?php $current = true; ?>

				<?php endif; ?>

				<?php get_template_part( 'includes/content-exhibitions', 'current' ); ?>

			<?php else : ?>

				<?php if ( $current ) : ?>
					</div>
					<?php $current = false; ?>
				<?php endif; ?>

				<?php if ( ! $past ) : ?>
					<div class="past-exhibitions">
					<?php $past = true; ?>

					<h2 class="exhibition__type exhibition__type--past title-line"><?php _e( 'Past', 'mc2020' ); ?></h2>

				<?php endif; ?>

				<?php if ( $year != $start_year ) : ?>

					<?php if ( $open ) : ?>

						</div></div>
						<?php $open = false; ?>

					<?php endif; ?>

					<?php $year = $start_year; ?>

					<div class="past-exhibitions__group">
					<?php $open = true; ?>
						<h3 class="past-exhibitions__year"><button class="past-exhibitions__toggle"><?php echo esc_html( $year ); ?></a></h3>

						<div class="past-exhibitions__grid">

				<?php endif; ?>

				<?php get_template_part( 'includes/content-exhibitions' ); ?>

			<?php endif; ?>

		<?php endwhile; ?>

			<?php if ( $open ) : ?>
				</div>
				<?php $open = false; ?>

			<?php endif; ?>

			<?php if ( $past ) : ?>
				</div>
				<?php $past = false; ?>
			<?php endif; ?>
	
		<?php endif; ?>

	</section>

</main>

<?php get_footer(); ?>
