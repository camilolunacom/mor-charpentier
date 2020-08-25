<?php
$artists = get_field( 'relation_artists_exhibitions' );

$start_date_string = get_field( 'start_date' );
$end_date_string = get_field( 'end_date' );

$start_date_format = _x( 'F jS', 'Current exhibition start date format', 'mc2020' );
$end_date_format = _x( 'F jS, Y', 'Current exhibition end date format', 'mc2020' );

$start_date  = DateTime::createFromFormat('Ymd', $start_date_string);
$end_date  = DateTime::createFromFormat('Ymd', $end_date_string);
?>

<article <?php post_class( 'current-exhibition' ); ?>>

	<?php if ( has_post_thumbnail() ) {

	$bg = get_the_post_thumbnail_url( get_the_ID(), 'news-grid' );

	} else {

	$bg = get_template_directory_uri() . '/assets/img/placeholder.svg';

	} ?>

	<a class="current-exhibition__link" href="<?php echo esc_url( get_the_permalink() ); ?>">

		<div class="current-exhibition__container" style="background-image: url('<?php echo esc_url( $bg ); ?>');">

			<div class="current-exhibition__overlay"></div>

			<header class="current-exhibition__header">

				<?php if ( $artists ) : ?>

					<div class="current-exhibition__artists">

						<ul class="current-exhibition__list">

							<?php foreach( $artists as $artist ):
							$title = get_the_title( $artist->ID );
							?>

								<li class="current-exhibition__item">
									<?php echo esc_html( $title ); ?>
								</li>

							<?php endforeach; ?>

						</ul>

					</div>

				<?php endif; ?>

				<?php the_title( '<h3 class="current-exhibition__title">', '</h3>'); ?>

				<?php if ( $start_date && $end_date ) : ?>

					<div class="current-exhibition__date">

						<?php echo esc_html( $start_date->format( $start_date_format ) ); ?> – <?php echo esc_html( $end_date->format( $end_date_format ) ); ?>

					</div>

				<?php endif; ?>

			</header>

		</div>

	</a>

</article>
