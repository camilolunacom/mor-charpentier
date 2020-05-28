<?php get_header(); ?>

  <div id="primary" class="content-area">

    <main class="site-main" role="main">

        <h1>
          <?php if ( is_page() ) {
            single_post_title();
          } else if ( is_category() || is_tag() ) {
            single_term_title();
          } else {
            wp_title( '' );
          }
        ?>
        </h1>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'includes/content' ); ?>

      <?php endwhile; else: ?>

        <?php get_template_part( 'includes/content', 'none' ); ?>

      <?php endif; ?>

    </main>

    <?php echo paginate_links(); ?>

  </div> <!-- #primary -->
  
  <?php get_sidebar(); ?>

  <h1>index.php</h1>

<?php get_footer(); ?>
