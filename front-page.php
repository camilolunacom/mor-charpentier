<?php get_header(); ?>

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

              <?php if ( $button_text ) : ?><a href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a><?php endif; ?>

            </div>

          </li>

        <?php endwhile; ?>
      <?php else : ?>

        <li class="glide__slide">
          <h2 class="glide__title">mor charpentier</h2>
        </li>

      <?php endif; ?>

      </ul>
    </div>

    <div class="glide__arrows" data-glide-el="controls">
      <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
      <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
    </div>

  </div>

</section>

<!-- Latest news -->
<section class="section">

  <h2><?php _e('Latest News', 'mc2020'); ?></h2>

  <div class="blog-posts">

  <?php
    $recent_posts = new WP_Query([
      'post_type' => 'post',
      'posts_per_page' => 3
    ]);

    if ( $recent_posts->have_posts() ) :
      while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
      ?>
 
      <div class="blog-post">
        <div class="blog-post__img">
          <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
          <div class="blog-post__overlay">
            <a class="blog-post__button" href="<?php echo the_permalink(); ?>">View more</a>
          </div>
        </div>
        <a class="blog-post__title" href="<?php echo the_permalink(); ?>">
          <h3 class="blog-post__"><?php echo the_title() ?></h3>
        </a>
        <p class="blog-post__excerpt"><?php echo the_excerpt() ?></p>
      </div>

    <?php endwhile; endif; wp_reset_query(); ?>

  </div>

</section>

<?php get_footer(); ?>
