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
         * Enable support for editor styles
         */
        add_theme_support( 'editor-styles' );

        /**
         * Add support for custom navigation menus.
         */
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'mc2020' ),
		) );

        add_image_size( 'news-grid', 456, 304, true );
        add_image_size( 'news', 600 );

    }
    add_action( 'after_setup_theme', 'mc2020_theme_setup' );

    /**
     * Enable support for WooCommerce
     */

    function mc2020_add_woocommerce_support() {
        add_theme_support( 'woocommerce', array(
            'thumbnail_image_width' => 708,
            'single_image_width'    => 708,
    
            'product_grid'          => array(
                'default_rows'    => 1,
                'min_rows'        => 1,
                'default_columns' => 2,
                'min_columns'     => 2,
                'max_columns'     => 2,
            ),
        ) );
        add_theme_support( 'wc-product-gallery-lightbox' );
    }
    
    add_action( 'after_setup_theme', 'mc2020_add_woocommerce_support' );

} // mc2020_theme_setup

// Register cusotm post types
if ( ! function_exists( 'custom_post_types' ) ) {

    function custom_post_types() {

        $artist_labels = array(
            'name' => _x( 'Artists', 'Post Type General Name', 'mc2020' ),
            'singular_name' => _x( 'Artist', 'Post Type Singular Name', 'mc2020' ),
            'menu_name' => __( 'Artists', 'mc2020' ),
            'name_admin_bar' => __( 'Artist', 'mc2020' ),
		);
        $artist_args = array(
            'label' => __( 'Artists', 'mc2020' ),
            'description' => __( 'Gallery artists.', 'mc2020' ),
            'labels' => $artist_labels,
            'supports' => array(
				'title',
				'editor',
				'thumbnail',
			),
            'public' => true,
            'menu_position' => 6,
            'menu_icon' => 'dashicons-groups',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => 'artists',
            'show_in_rest' => true,
        );
        register_post_type( 'artist', $artist_args );

        $exhibition_labels = array(
            'name' => _x( 'Exhibitions', 'Post Type General Name', 'mc2020' ),
            'singular_name' => _x( 'Exhibition', 'Post Type Singular Name', 'mc2020' ),
            'menu_name' => __( 'Exhibitions', 'mc2020' ),
            'name_admin_bar' => __( 'Exhibition', 'mc2020' ),
		);
        $exhibition_args = array(
            'label' => __( 'Exhibitions', 'mc2020' ),
            'description' => __( 'Gallery exhibitions.', 'mc2020' ),
            'labels' => $exhibition_labels,
            'supports' => array(
				'title',
				'editor',
				'thumbnail',
			),
            'public' => true,
            'menu_position' => 7,
            'menu_icon' => 'dashicons-images-alt2',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => 'exhibitions',
            'show_in_rest' => true,
		);
        register_post_type( 'exhibition', $exhibition_args );

        $viewing_room_labels = array(
            'name' => _x( 'Viewing Rooms', 'Post Type General Name', 'mc2020' ),
            'singular_name' => _x( 'Viewing Room', 'Post Type Singular Name', 'mc2020' ),
            'menu_name' => __( 'Viewing Rooms', 'mc2020' ),
            'name_admin_bar' => __( 'Viewing Room', 'mc2020' ),
		);
        $viewing_room_args = array(
            'label' => __( 'Viewing Room', 'mc2020' ),
            'description' => __( 'Gallery viewing rooms.', 'mc2020' ),
            'labels' => $viewing_room_labels,
            'supports' => array(
				'title',
				'editor',
				'thumbnail',
			),
            'taxonomies' => array('category', 'post_tag'),
            'public' => true,
            'menu_position' => 8,
            'menu_icon' => 'dashicons-cover-image',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive'  => 'viewing-rooms',
            'show_in_rest' => true,
		);
        register_post_type( 'viewing-room', $viewing_room_args );

        $artwork_labels = array(
             'name' => _x('Artworks', 'Post Type General Name', 'mc2020' ),
            'singular_name' => _x( 'Artwork', 'Post Type Singular Name', 'mc2020' ),
            'menu_name' => __( 'Artworks', 'mc2020' ),
            'name_admin_bar' => __( 'Artwork', 'mc2020' ),
		);
        $artwork_args = array(
            'label' => __( 'Artwork', 'mc2020' ),
            'description' => __( 'Gallery artworks.', 'mc2020' ),
            'labels' => $artwork_labels,
            'supports' => array(
				'title',
			),
            'public' => true,
            'menu_position' => 9,
            'menu_icon' => 'dashicons-art',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => false,
		);
        register_post_type( 'artwork', $artwork_args );

    }
    add_action( 'init', 'custom_post_types', 0 );

}  // custom_post_types

/**
 * Load JS and CSS
 */

function mc2020_enqueue_scripts() {
	wp_enqueue_style( 'mc2020-style', get_template_directory_uri() . '/style.css', [], time() );
    wp_enqueue_script( 'mc2020-slick', get_template_directory_uri() . '/assets/js/slick.min.js', [], '1.8.1', true );
    wp_enqueue_script( 'mc2020-script', get_template_directory_uri() . '/assets/js/script.js', ['jquery', 'mc2020-slick'], time(), true );
    wp_localize_script( 'mc2020-script', 'objectL10n', array(
        'showFilters'   => esc_html__( 'Show filters', 'mc2020' ),
        'hideFilters'   => esc_html__( 'Hide filters', 'mc2020' ),
    ) );    
}
add_action( 'wp_enqueue_scripts', 'mc2020_enqueue_scripts' );

add_editor_style( 'style-editor.css' );

/**
 * Create options page
 */

function mc2020_acf_op_init() {
    
    if ( function_exists( 'acf_add_options_page' ) ) {
        
        $option_page = acf_add_options_page( array(
            'page_title'    => __('Theme Options', 'mc2020'),
            'menu_title'    => __('MC2020', 'mc2020'),
            'menu_slug'     => 'mc2020',
            'capability'    => 'edit_posts',
            'redirect'      => true,
            'post_id'       => 1754,
        ));

    }
}
add_action('acf/init', 'mc2020_acf_op_init');

/**
 * Create artwork block
 */

function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type( array(
            'name'              => 'artwork',
            'title'             => __('Artwork', 'mc2020'),
            'description'       => __('Display an artwork.', 'mc2020'),
            'category'          => 'common',
            'icon'              => 'art',
            'keywords'          => array( 'artwork', 'art', 'work', 'piece', 'art piece' ),
            'post_types'        => array( 'exhibition', 'viewing-room', 'artist' ),
            'mode'              => 'edit',
            'render_template'   => get_template_directory() . 'includes/blocks/artwork/artwork.php',
            'enqueue_style'     => get_template_directory_uri() . '/includes/blocks/artwork/artwork.css',
            'enqueue_script'    => get_template_directory_uri() . '/includes/blocks/artwork/artwork.js',
            'supports'          => array(
                'align'             => false,
                'mode'              => false,
            ),
        ));

        acf_register_block_type( array(
            'name'              => 'image-row',
            'title'             => __('Image Row', 'mc2020'),
            'description'       => __('All images inside the block will have the same height.', 'mc2020'),
            'category'          => 'formatting',
            'mode'              => 'preview',
            'icon'              => 'align-wide',
            'keywords'          => array( 'image', 'row' ),
            'post_types'        => array( 'exhibition', 'viewing-room', 'artist' ),
            'render_template'   => get_template_directory() . 'includes/blocks/image-row/image-row.php',
            'enqueue_style'     => get_template_directory_uri() . '/includes/blocks/image-row/image-row.css',
            'enqueue_script'    => get_template_directory_uri() . '/includes/blocks/image-row/image-row.js',
            'supports'          => array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            ),
        ));
    }
}
add_action('acf/init', 'my_acf_init_block_types');

/**
 * Fix .current_page_parent class on nav for CPT
 * From: https://wordpress.stackexchange.com/questions/206523/remove-current-page-parent-nav-class-from-blog-index-when-in-cpt/206536
 */

function mc2020_remove_cpt_blog_class( $classes, $item, $args ) {

    if ( ! is_singular( 'post' ) && ! is_category() && ! is_tag() && ! is_date() ) {

        $blog_page_id = intval( get_option( 'page_for_posts' ) );

        if ( $blog_page_id != 0 && $item->object_id == $blog_page_id ) {
            unset( $classes[ array_search( 'current_page_parent', $classes ) ] );
        }

    }

    return $classes;

}
add_filter( 'nav_menu_css_class', 'mc2020_remove_cpt_blog_class', 10, 3 );

function mc2020_add_cpt_ancestor_class( $classes, $item, $args ) {

    global $post;

    $current_post_type = get_post_type_object( get_post_type( $post->ID ) );

    $current_post_type_slug = $current_post_type->rewrite[ 'slug' ];

    $menu_slug = strtolower( trim( $item->url ) );

    if ( strpos( $menu_slug, $current_post_type_slug ) !== false ) {
        $classes[] = 'current_page_parent';
    }

    return $classes;

}
add_action( 'nav_menu_css_class', 'mc2020_add_cpt_ancestor_class', 10, 3 );

/**
 * Modify artists archive query
 */

function mc2020_artists_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( is_post_type_archive( 'artist' ) || is_post_type_archive( 'exhibition' ) ) {
            $query->set( 'posts_per_page', -1 );
            return;
        }
    }
}
add_action( 'pre_get_posts', 'mc2020_artists_query', 1 );

/**
 * Modify exhibitions archive query
 */

function mc2020_exhibitions_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'exhibition' ) ) {
        $query->set( 'meta_key', 'end_date' );
        $query->set( 'orderby', 'meta_value_num' );
        return;
    }
}
add_action( 'pre_get_posts', 'mc2020_exhibitions_query', 1 );

/**
 * Artwork: save first image from gallery as featured image
 */

function set_artwork_featured_image_from_gallery() {
    $images = get_field( 'artwork_images', false, false );
    $image_id = $images[0];

    if ( $image_id ) {
        set_post_thumbnail( $post->ID, $image_id );
    }
}
add_action( 'save_post', 'set_artwork_featured_image_from_gallery' );

/**
 * WooCommerce hooks
 */

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// Archive pages

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_main_content', 'mc2020_section_wrapper_open', 5 );
add_action( 'woocommerce_before_shop_loop_item', 'mc2020_product_image_wrapper_open', 20 );
add_action( 'woocommerce_before_shop_loop_item_title', 'mc2020_product_overlay', 5 );
add_action( 'woocommerce_shop_loop_item_title', 'mc2020_product_image_wrapper_close', 5 );
add_action( 'woocommerce_after_main_content', 'mc2020_section_wrapper_close', 20 );

// Single products

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_single_product_summary', 'the_content', 20 );

/**
 * WooCommerce hook functions
 */

function mc2020_section_wrapper_open() {
    echo '<div class="mc-section">';
}

function mc2020_section_wrapper_close() {
    echo '</div>';
}

function mc2020_product_overlay() {
    $text_button = sprintf( esc_html__( 'View %s', 'mc2020' ), get_post_type() );
    echo '<div class="product__overlay"><button class="product__button btn">' . $text_button . '</button></div>';
}

function mc2020_product_image_wrapper_open() {
    echo '<div class="product__thumbnail-wrapper">';
}

function mc2020_product_image_wrapper_close() {
    echo '</div>';
}

/**
 * WPML helper function that returns original ids when translated versions don't exist
 * @since 1.0.0
 * @author ryanapsmith
 * URL: https://wpml.org/forums/topic/page-templates-not-working-in-translated-languages-eg-page-about-us-php/#post-6929215
 * @param integer content type id
 * @param string content type
 * @param string default language to show (optional)
 *
 * @return integer
 */
 
function _wpml_id( $id, $type, $lang = '' ) {
    if ( ! empty( $lang ) ) {
        $original = false;
    } else {
        $original = true;
    }
 
    return apply_filters( 'wpml_object_id', $id, $type, $original, $lang );
}
 

/**
 * WPML helper function to set the default language template regardless of current language
 *
 * @since 1.0.0
 * @author ryanapsmith
 * @return object
 * URL: https://wpml.org/forums/topic/page-templates-not-working-in-translated-languages-eg-page-about-us-php/#post-6929215
 *
 */
 
function _set_template_by_lang( $template ) {
    if ( function_exists( 'icl_get_languages' ) ) {
        global $sitepress;
        $default_lang = $sitepress->get_default_language();
        $lang         = ICL_LANGUAGE_CODE;
 
        if ( $lang != $default_lang ) {
            if ( is_page() ) {
                //get original page id
                $original_post_id = _wpml_id( get_the_ID(), 'page', $default_lang );
                //get slug of original page
                $slug = get_post_field( 'post_name', $original_post_id );
 
                $new_template = locate_template( array( 'page-' . $slug . '.php' ) );
                if ( ! empty( $new_template ) ) {
                    return $new_template;
                }
            }
        }
    }
 
    return $template;
}
 
add_filter( 'template_include', '_set_template_by_lang', 99 );

// remove "Private: " from titles
add_filter( 'private_title_format', 'cv_disable_title_prefix', 99, 2 );
add_filter( 'protected_title_format', 'cv_disable_title_prefix', 99,2  );
function cv_disable_title_prefix( $format, $post ) {
	$format = '%s';
	return $format;
}

