<?php get_header(); ?>

<?php
$current = false;
$past = false;
$today = date( 'Ymd' );
$year = 0;
?>

<main class="'site-main" role="main">

	<section class="section exhibition">

		<h1 class="section__title">
			<?php post_type_archive_title(); ?>
		</h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php $end_date = get_field( 'end_date' );
			$end_date_obj = DateTime::createFromFormat("Ymd", $end_date);

			if ( is_object( $end_date_obj ) ) {
				$end_year = $end_date_obj->format('Y');
			}
			?>

			<?php if ( $end_date >= $today ) : ?>

				<?php if ( ! $current ) : ?>

				<div class="current-exhibitions">

					<div class="exhibition__type title-line">
						<?php _e( 'Current', 'mc2020' ); ?>
					</div>

					<?php $current = true; ?>

				<?php endif; ?>

					<?php get_template_part( 'includes/content-exhibitions', 'current' ); ?>

			<? else : ?>

				<?php if ( $current ) : ?>
					</div> <!-- .current-exhibitions -->
					<?php $current = false; ?>
				<?php endif; ?>

				<?php if ( ! $past ) : ?>
					<div class="past-exhibitions">
					<?php $past = true; ?>
				<?php endif; ?>

				<?php $start_year = substr( get_field( 'start_date' ), 0, 4 ); ?>
				
				<?php if ( $year != $start_year ) : ?>

					<?php $year = $start_year; ?>

				<?php endif; ?>

				<?php get_template_part( 'includes/content-exhibitions' ); ?>
	
				<?php if ( $past ) : ?>
					</div> <!-- .past-exhibitions -->
					<?php $past = false; ?>
				<?php endif; ?>

			<? endif; ?>

		<?php endwhile; endif; ?>

		</div>

	</section>

	<section class="section section--no-padding-top section--no-padding-bottom">

		<div class="pagination">
			<?php echo paginate_links(); ?>
		</div>

	</section>

</main>

<?php get_footer(); ?>
