<?php
$artists = get_field( 'relation_artists_exhibitions' );

$start_date_string = get_field( 'start_date' );
$end_date_string = get_field( 'end_date' );

$start_date_format_short = _x( 'F jS', 'Current exhibition start date format', 'mc2020' );
$start_date_format = _x( 'F jS, Y', 'Current exhibition start date format', 'mc2020' );
$end_date_format = _x( 'F jS, Y', 'Current exhibition end date format', 'mc2020' );

$start_date  = DateTime::createFromFormat('Ymd', $start_date_string);
$end_date  = DateTime::createFromFormat('Ymd', $end_date_string);
?>

<article <?php post_class( 'past-exhibition' ); ?>>

	<?php if ( has_post_thumbnail() ) {

	$bg = get_the_post_thumbnail_url( get_the_ID(), 'news-grid' );

	} else {

	$bg = get_template_directory_uri() . '/assets/img/placeholder.svg';

	} ?>

	<a class="past-exhibition__link" href="<?php echo esc_url( get_the_permalink() ); ?>">

		<div class="past-exhibition__container">

			<div class="past-exhibition__image" style="background-image: url('<?php echo esc_url( $bg ); ?>');">

				<div class="past-exhibition__overlay">

					<button class="past-exhibition__button btn btn--small" href="<?php echo the_permalink(); ?>">
						<?php _e( 'View', 'mc2020' ); 
						echo ' ' . esc_html( get_post_type() ); ?>
					</button>

				</div>

			</div>

			<header class="past-exhibition__header">

				<?php the_title( '<h4 class="past-exhibition__title">', '</h4>'); ?>

				<?php if ( $artists ) : ?>

					<div class="past-exhibition__artist">

					<?php if ( count( $artists ) > 1 ) {
						_e( 'Group exhibition', 'mc2020');
					} else {
						echo $artists[0]->post_title;
					} ?>

					</div>

				<?php endif; ?>

				<?php if ( $start_date && $end_date ) : ?>

					<div class="past-exhibition__date">

						<?php
						$start_year = substr( $start_date_string, 0, 4 );
						$end_year = substr( $end_date_string, 0, 4 );
						?>

						<?php if ( $start_year == $end_year ) : ?>

							<?php echo esc_html( $start_date->format( $start_date_format_short ) ); ?> &ndash; <?php echo esc_html( $end_date->format( $end_date_format ) ); ?>

						<?php else : ?>

							<?php echo esc_html( $start_date->format( $start_date_format ) ); ?> &ndash; <?php echo esc_html( $end_date->format( $end_date_format ) ); ?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			</header>

		</div>

	</a>

</article>
