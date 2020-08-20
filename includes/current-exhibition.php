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

        $start_date_format = _x( 'F dS', 'Current exhibition start date format', 'mc2020' );
        $end_date_format = _x( 'F dS, Y', 'Current exhibition end date format', 'mc2020' );

        $start_date  = DateTime::createFromFormat('Ymd', $start_date_string);
        $end_date  = DateTime::createFromFormat('Ymd', $end_date_string);
      ?>

      <p class="footer-exhibition__dates">
        <?php echo esc_html( $start_date->format( $start_date_format ) ); ?> – <?php echo esc_html( $end_date->format( $end_date_format ) ); ?>
      </p>

    </a>

  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <h3 class="footer_exhibition__title"><?php _e( 'There are no current exhibitions', 'mc2020' ); ?></h3>
<?php endif; ?>

</div>
