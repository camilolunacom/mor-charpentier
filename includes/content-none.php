<article <?php post_class( 'no-content' ); ?>>

  <header class="entry-header">

    <h1><?php esc_html_e( 'No content found', 'mc2020'); ?></h1>

  </header>

  <div class="entry-content">

    <p><?php esc_html_e( "We couldn't find any content.", 'mc2020' ); ?></p>

    <p><a href="<?php echo esc_url( home_url( '/') ); ?>" role="home">Go to homepage</a></p>

  </div>

</article>