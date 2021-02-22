<?php get_header(); ?>

<?php
$artists = get_field( 'relation_artists_exhibitions' );
$vrs = get_field( 'relation_exhibitions_vrs' );
$press_release = get_field( 'press_release' );

$start_date_string = get_field( 'start_date' );
$end_date_string = get_field( 'end_date' );

$start_timestamp = strtotime( $start_date_string );
$end_timestamp = strtotime( $end_date_string );

$start_date_format = _x( 'F jS', 'Current exhibition start date format', 'mc2020' );
$end_date_format = _x( 'F jS, Y', 'Current exhibition end date format', 'mc2020' );

$start_date  = date_i18n( $start_date_format, $start_timestamp );
$end_date  = date_i18n( $end_date_format, $end_timestamp );

$press_release = get_field( 'press_release' );
$press_release_es = get_field( 'press_release_es' );
$press_release_fr = get_field( 'press_release_fr' );

if ( ICL_LANGUAGE_CODE == 'es' && $press_release_es ) {
    $pr = $press_release_es;
} elseif ( ICL_LANGUAGE_CODE == 'fr' && $press_release_fr  ) {
    $pr = $press_release_fr;
} elseif ( $press_release ) {
    $pr = $press_release;
}
?>

<main class="site-main" role="main">

  <article <?php post_class( 'mc-section single single--exhibition' ); ?>>

    <header class="single__header">

      <h1 class="mc-section__title single--exhibition__title">

        <?php single_post_title(); ?>

      </h1>

      <?php if ( $artists ) : ?>

      <ul class="single--exhibition__artists">

        <?php foreach( $artists as $artist ) : 
					$permalink = get_permalink( $artist->ID );
					$title = get_the_title( $artist->ID );
				    $status = get_post_status( $artist->ID );
            	?>

        <?php if ( $status == 'publish' ) : ?>

        <li class="single--exhibition__artist">
          <h2>
            <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
          </h2>
        </li>

        <?php else : ?>

        <li class="single--exhibition__artist">
          <h2>
            <?php echo esc_html( $title ); ?>
          </h2>
        </li>

        <?php endif; ?>

        <?php endforeach; ?>

      </ul>

      <?php endif; ?>

      <?php if ( $start_date && $end_date ) : ?>

      <div class="single--exhibition__date">

        <?php echo esc_html( $start_date ); ?> – <?php echo esc_html( $end_date ); ?>

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

      <?php if ( get_previous_post() ) : ?>

      <div class="exhibition__arrow exhibition__arrow--prev">
        <?php previous_post_link( '%link', '<span>%title</span>' ); ?>
      </div>

      <?php endif; ?>

      <?php if ( get_next_post() ) : ?>

      <div class="exhibition__arrow exhibition__arrow--next">
        <?php next_post_link( '%link', '<span>%title</span>' ); ?>
      </div>

      <?php endif; ?>

    </header>

    <div class="single__main">

      <?php get_template_part( 'includes/content-single' ); ?>

    </div>

  </article>

  <aside class="mc-section mc-section--no-padding-top single__share cols">

    <?php if ( $pr ) : ?>

    <div class="col-half">

      <div class="share">

        <h4 class="share__title title-line">

          <?php _e( 'Press release', 'mc2020' ); ?>

        </h4>

        <div class="sm-icons share__btns">

          <a class="sm-icons__link" href="<?php echo $pr; ?>" target="_blank">

            <svg xmlns="http://www.w3.org/2000/svg" class="sm-icons__svg" viewbox="0 0 40 40">
              <g id="sm-press-release" class="sm-icons__g sm-icons__g--press-release">
                <circle class="sm-icons__circle" cx="20" cy="20" r="20" />
                <circle class="sm-icons__border" cx="20" cy="20" r="19" />
                <path class="sm-icons__brand" d="M23 15.62h4.78v11.54a.85.85 0 01-.84.84H15.09a.85.85 0 01-.84-.84V10.84a.85.85 0 01.84-.84h7v4.78a.84.84 0 00.91.84zm1 2.25h-5.9a.43.43 0 00-.43.43v.28a.43.43 0 00.43.42H24a.43.43 0 00.43-.42v-.28a.43.43 0 00-.43-.43zm.43 2.68a.43.43 0 00-.43-.43h-5.9a.43.43 0 00-.43.43v.28a.43.43 0 00.43.42H24a.43.43 0 00.43-.42zm0 2.25a.42.42 0 00-.43-.42h-5.9a.42.42 0 00-.43.42v.28a.43.43 0 00.43.42H24a.43.43 0 00.43-.42zm3.37-8.3h-4.5V10h.21a.84.84 0 01.6.25l3.44 3.44a.84.84 0 01.25.6z" />
              </g>
            </svg>

          </a>

        </div>

      </div>

    </div>

    <?php endif; ?>

    <div class="col-half">

      <?php get_template_part( 'includes/social-share' ); ?>

    </div>

  </aside>

</main>

<?php get_template_part( 'includes/single-overlay' ); ?>

<script type="text/javascript">
if (undefined !== window.jQuery) {
  jQuery(document).on('mouseenter', '.happyforms-form form', function() {
    jQuery('.happyforms-form').happyForm();
  });
}
</script>

<?php get_footer(); ?>