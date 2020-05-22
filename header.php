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
    <?php esc_html_e( 'Skip to content', 'alzr' ); ?>
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

    <div class=main-header__extra">
      <nav class="main-header__lang-switcher" role="navigation" aria-label="Language switcher">
        <?php do_action('wpml_add_language_selector'); ?>
      </nav>

      <nav class="main-header__dev-team" role="navigation" aria-label="Development team external links">
        <a href="http://elmonocromo.com/" class="main-header__dev-link" target="_blank"><span>El Monocromo</span></a> + <a href="http://8manos.com/" class="main-header__dev-link" target="_blank"><span>8manos</span></a> + <a href="https://www.alunizar.co/" class="main-header__dev-link" target="_blank"><span>Alunizar</span></a>
      </nav>
    </div>

  </header>

  <div id="content">
