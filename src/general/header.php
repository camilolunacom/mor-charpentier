<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <nav id="site-navigation" class="main-navigation" role="navigation">
    <?php
      $args = [
        'theme_location' => 'primary'
      ];
      wp_nav_menu( $args );
    ?>
  </nav>
