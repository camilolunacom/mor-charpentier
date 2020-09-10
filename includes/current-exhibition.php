<?php

  $today = date( 'Ymd' );

  $last_exhibition = new WP_Query( array(
    'post_type' => 'exhibition',
    'posts_per_page' => 1,
    'meta_query' => array(
      array(
        'key'     => 'end_date',
        'compare' => '>=',
        'value'   => $today
      ),
    ),
  ) );

?>

<div class="footer-exhibition">

<?php if ( $last_exhibition->have_posts() ) : ?>
  <?php while ( $last_exhibition->have_posts() ) : $last_exhibition->the_post(); ?>

  <h3 class="footer-exhibition__title"><?php _e( 'Current exhibition', 'mc2020' ); ?></h3>
  
  <a class="footer-exhibition__link" href="<?php the_permalink(); ?>">
  
      <?php the_title('<h4 class="footer-exhibition__name">', '</h4>'); ?>

      <?php $related_artists = get_field( 'relation_artists_exhibitions' ); ?>

      <?php if ( $related_artists ) : ?>
        <ul class="footer-exhibition__artists">
          <?php foreach( $related_artists as $related_artist ): ?>
            <li class="footer-exhibition__artist"><?php echo get_the_title( $related_artist->ID ); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php
        $start_date_string = get_field( 'start_date' );
        $end_date_string = get_field( 'end_date' );

        $start_timestamp = strtotime( $start_date_string );
        $end_timestamp = strtotime( $end_date_string );

        $start_date_format = _x( 'F jS', 'Current exhibition start date format', 'mc2020' );
        $end_date_format = _x( 'F jS, Y', 'Current exhibition end date format', 'mc2020' );

        $start_date  = date_i18n( $start_date_format, $start_timestamp );
        $end_date  = date_i18n( $end_date_format, $end_timestamp );

      ?>

      <p class="footer-exhibition__dates">
        <?php echo esc_html( $start_date ); ?> – <?php echo esc_html( $end_date ); ?>
      </p>

    </a>

  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <h3 class="footer-exhibition__title footer-exhibition__title--none"><?php _e( 'There are no current exhibitions', 'mc2020' ); ?></h3>
<?php endif; ?>

</div>
