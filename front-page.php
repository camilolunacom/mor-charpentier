<?php get_header( 'home' ); ?>

  <nav class="home__nav" role="navigation" aria-label="Main">
    <?php
      $args = [
        'theme_location'  => 'primary',
        'container_class' => 'main-header__nav-container',
        'menu_class'      => 'main-header__menu'
      ];
      wp_nav_menu( $args );
    ?>
  </nav>

  <h1>front-page.php</h1>

<?php get_footer(); ?>
