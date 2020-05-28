<?php get_header(); ?>

  <div id="primary" class="content-area">
    <main class="site-main" role="main">

      <article <?php post_class(); ?>>

        <div class="single__container">              

          <header class="entry-header">

            <h1><?php esc_html_e( 'Page not found', 'mc2020'); ?></h1>

          </header>

          <div class="entry-content">

            <p><?php esc_html_e( "We couldn't find the page you were looking for.", 'mc2020'); ?></p>
            <p><a href="<?php echo esc_url( home_url( '/') ); ?>" role="home"><?php esc_html_e( 'Go to homepage', 'mc2020'); ?></a></p>
            
          </div>

        </div>

      </article>

    </main>

  </div> <!-- #primary -->

  <h1>404.php</h1>

<?php get_footer(); ?>
