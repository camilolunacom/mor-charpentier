<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="page">

  <a href="#content" class="skip-link screen-reader-text">
    <?php esc_html_e( 'Skip to content', 'mc2020' ); ?>
  </a>

  <header class="main-header" role="banner">

    <div class="main-header__logo">
      <a href="<?php echo esc_url( home_url( '/') ); ?>" role="home">Logo</a>
    </div>

    <nav class="main-header__nav" role="navigation" aria-label="Main">
      <?php
        $args = [
          'theme_location'  => 'primary',
          'container_class' => 'main-header__nav-container',
          'menu_class'      => 'main-header__menu'
        ];
        wp_nav_menu( $args );
      ?>
    </nav>

  </header>

  <div id="content">
