<?php

// Setup Theme
if ( ! function_exists( 'mc2020_theme_setup' ) ) {
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   */
  function mc2020_theme_setup() {
    
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'mc2020', get_template_directory() . '/languages' );
    
    /**
     * Add title tag to the head of pages
     */
    add_theme_support( 'title-tag' );

    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );

    /**
     * Enable support for post html5 features.
     */
    add_theme_support( 'html5' );
  
    /**
     * Add support for custom navigation menus.
     */
    register_nav_menus( [
        'primary'   => esc_html__( 'Primary Menu', 'mc2020' ),
    ] );

  }
  add_action( 'after_setup_theme', 'mc2020_theme_setup' );

} // mc2020_theme_setup

// Setup widget areas.
if ( ! function_exists( 'mc2020_widgets_init' ) ) {

  function mc2020_widgets_init() {

    $args = [
      'name'          => esc_html__( 'News Sidebar', 'mc2020' ),
      'id'            => 'news-sidebar',
      'description'   => esc_html__( 'Add widgets for news sidebar.', 'mc2020'),
      'before_widget' => '<section class="widget">',
      'class'         => 'news-sidebar',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class=news-sidebar__title">',
      'after_title'   => '</h2>',
    ];
    register_sidebar( $args );

  }
  add_action( 'widgets_init', 'mc2020_widgets_init' );

} // mc2020_widgets_init

/**
 * Load JS and CSS
 */

function mc2020_enqueue_scripts() {
  wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/style.css', [], time() );
  
  if ( is_front_page() ) {
    wp_enqueue_script( 'alunizar-glide', get_stylesheet_directory_uri() . '/assets/js/glide.min.js', [], '3.4.1', true );
    wp_enqueue_style( 'alunizar-glide-core', get_stylesheet_directory_uri() . '/assets/css/glide.core.min.css', [], '3.4.1' );
    wp_enqueue_style( 'alunizar-glide-theme', get_stylesheet_directory_uri() . '/assets/css/glide.theme.min.css', ['alunizar-glide-core'], '3.4.1' );
    wp_enqueue_script( 'alunizar-home', get_stylesheet_directory_uri() . '/assets/js/home.js', ['alunizar-glide'], time(), true );
  }


} 
add_action( 'wp_enqueue_scripts', 'mc2020_enqueue_scripts');

?>
