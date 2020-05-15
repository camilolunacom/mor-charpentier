<?php

// Setup Theme

if ( ! function_exists( 'alzr_theme_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   */
  function alzr_theme_setup() {
    
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'alzr', get_template_directory() . '/languages' );
    
    /**
     * Add title tag to the head of pages
     */
    add_theme_support( 'title_tag' );

    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );

    /**
     * Enable support for post html5 features.
     */
    add_theme_support( 'html5' );
  
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( [
        'primary'   => esc_html__( 'Primary Menu', 'alzr' ),
    ] );

  }
endif; // alzr_theme_setup
add_action( 'after_setup_theme', 'alzr_theme_setup' );

/**
 * Load JS and CSS
 */
function alzr_enqueue_scripts() {
  wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', [], time() );
}
add_action( 'wp_enqueue_scripts', 'alzr_enqueue_scripts');



?>
