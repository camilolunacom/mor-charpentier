<?php get_header(); ?>

<?php
$artists = get_field( 'relation_artists_exhibitions' );
$vrs = get_field( 'relation_exhibitions_vrs' );
$press_release = get_field( 'press_release' );

$start_date_string = get_field( 'start_date' );
$end_date_string = get_field( 'end_date' );

$start_date_format = _x( 'F jS', 'Current exhibition start date format', 'mc2020' );
$end_date_format = _x( 'F jS, Y', 'Current exhibition end date format', 'mc2020' );

$start_date  = DateTime::createFromFormat('Ymd', $start_date_string);
$end_date  = DateTime::createFromFormat('Ymd', $end_date_string);
?>

<main class="site-main" role="main">

	<article <?php post_class( 'section single single--exhibition' ); ?>>

		<header class="single__header">

		<?php if ( $artists ) : ?>
			
			<ul class="single--exhibition__artists">
				
				<?php foreach( $artists as $artist ) : 
					$permalink = get_permalink( $artist->ID );
					$title = get_the_title( $artist->ID );
				?>

					<li class="single--exhibition__artist">

						<h2>

							<a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>

						</h2>

					</li>

				<?php endforeach; ?>

			</ul>

			<?php endif; ?>

			<h1 class="section__title single--exhibition__title">

				<?php single_post_title(); ?>

			</h1>

			<?php if ( $start_date && $end_date ) : ?>

				<div class="single--exhibition__date">

					<?php echo esc_html( $start_date->format( $start_date_format ) ); ?> – <?php echo esc_html( $end_date->format( $end_date_format ) ); ?>

				</div>

			<?php endif; ?>

			<div class="single__extra extra">

				<?php if ( $vrs ) : ?>

					<div class="extra__container extra__container--viewingrooms">

						<h3 class="extra__title"><?php _e( 'Related Viewing Rooms:', 'mc2020' ); ?></h3>

						<ul class="extra__list">

							<?php foreach( $vrs as $vr ): 
								$permalink = get_permalink( $vr->ID );
								$title = get_the_title( $vr->ID );
							?>

								<li class="extra__item">
									<a class="extra__link" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
								</li>

							<?php endforeach; ?>

						</ul>

					</div>

				<?php endif; ?>

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

</main>

<?php get_footer(); ?>
