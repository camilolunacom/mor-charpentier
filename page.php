<?php get_header(); ?>

  <div id="primary" class="content-area">

    <main class="site-main" role="main">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'includes/content', 'page' ); ?>

      <?php endwhile; endif; ?>

    </main>

  </div> <!-- #primary -->

  <h1>page.php</h1>

<?php get_footer(); ?>
