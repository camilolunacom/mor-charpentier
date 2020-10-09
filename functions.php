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
            'render_template'   => 'includes/blocks/artwork/artwork.php',
            'supports'          => array(
                'align'             => false,
                'mode'              => false,
            ),
        ));

        acf_register_block_type( array(
            'name'              => 'related',
            'title'             => __('Related Posts', 'mc2020'),
            'description'       => __('Related posts to this post.', 'mc2020'),
            'category'          => 'common',
            'icon'              => 'format-aside',
            'keywords'          => array( 'related' ),
            'post_types'        => array( 'artist' ),
            'mode'              => 'preview',
            'render_template'   => 'includes/blocks/related/related.php',
            'supports'          => array(
                'align' => false,
                'mode' => false,
            ),
        ));

        acf_register_block_type( array(
            'name'              => 'biography',
            'title'             => __('Biography', 'mc2020'),
            'description'       => __('Artist biography.', 'mc2020'),
            'category'          => 'common',
            'icon'              => 'format-aside',
            'keywords'          => array( 'bio', 'biography', 'description' ),
            'post_types'        => array( 'artist' ),
            'mode'              => 'preview',
            'render_template'   => 'includes/blocks/biography/biography.php',
            'supports'          => array(
                'align' => false,
                'mode' => false,
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

/**
 * ACF Field registration
 */

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5f459425f0fba',
        'title' => 'Block: Artwork',
        'fields' => array(
            array(
                'key' => 'field_5f4594479d50c',
                'label' => 'Artwork',
                'name' => 'artwork',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'post_type' => array(
                    0 => 'artwork',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'id',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/artwork',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5f4587158543f',
        'title' => 'Artwork Information',
        'fields' => array(
            array(
                'key' => 'field_5f45872bc04ad',
                'label' => 'Artist',
                'name' => 'artist',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'post_type' => array(
                    0 => 'artist',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'id',
                'ui' => 1,
            ),
            array(
                'key' => 'field_5f458751c04ae',
                'label' => 'Images',
                'name' => 'artwork_images',
                'type' => 'gallery',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'return_format' => 'id',
                'preview_size' => 'medium',
                'insert' => 'append',
                'library' => 'all',
                'min' => 1,
                'max' => '',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5f458815c04af',
                'label' => 'Is the artwork for sale?',
                'name' => 'availability',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '34',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_5f4a75c30ae69',
                'label' => 'Show price?',
                'name' => 'show_price',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f458815c04af',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '34',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_5f458864c04b0',
                'label' => 'Price',
                'name' => 'price',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f4a75c30ae69',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '32',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '€',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_5f4589407e4d1',
                'label' => 'Short description',
                'name' => 'short_description',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 3,
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_5f4589517e4d2',
                'label' => 'Full description',
                'name' => 'full_description',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 3,
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'artwork',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5f45479d49c67',
        'title' => 'About Page',
        'fields' => array(
            array(
                'key' => 'field_5f454fad3f4a1',
                'label' => 'Image gallery',
                'name' => 'image_gallery',
                'type' => 'gallery',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
                'insert' => 'append',
                'library' => 'all',
                'min' => 1,
                'max' => '',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5f454805979f1',
                'label' => 'Schedule',
                'name' => 'schedule',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 2,
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 2,
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_5f454821979f2',
                'label' => 'Address Field 1',
                'name' => 'address_field_1',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '30',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 2,
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_5f454894979f3',
                'label' => 'Address Field 2',
                'name' => 'address_field_2',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '30',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 2,
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_5f454899979f4',
                'label' => 'Address Field 3',
                'name' => 'address_field_3',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '30',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 2,
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_5f4548c6979f5',
                'label' => 'Phone',
                'name' => 'phone',
                'type' => 'number',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '+',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_5f45490e979f6',
                'label' => 'Phone Display',
                'name' => 'phone_display',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 2,
                'new_lines' => 'br',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '1754',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5f43ed6a28ba7',
        'title' => 'Viewing Room Extra Information',
        'fields' => array(
            array(
                'key' => 'field_5f43ed6a2db07',
                'label' => 'Related Exhibitions',
                'name' => 'relation_exhibitions_vrs',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'post_type' => array(
                    0 => 'exhibition',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'object',
            ),
            array(
                'key' => 'field_5f43ed6a2db0f',
                'label' => 'Related Artists',
                'name' => 'relation_artists_vrs',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'post_type' => array(
                    0 => 'artist',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'object',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'viewing-room',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5f43d8ba3f27c',
        'title' => 'Artist Information',
        'fields' => array(
            array(
                'key' => 'field_5f43d8c51dc5b',
                'label' => 'Subtitle',
                'name' => 'subtitle',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 3,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5f807b2c9e92a',
                'label' => 'Biography - Always visible',
                'name' => 'shown',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 0,
                'wpml_cf_preferences' => 3,
            ),
            array(
                'key' => 'field_5f807b4a9e92b',
                'label' => 'Biography - Show/hide',
                'name' => 'hidden',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 0,
                'wpml_cf_preferences' => 3,
            ),
            array(
                'key' => 'field_5f43d8d31dc5c',
                'label' => 'Related Exhibitions',
                'name' => 'relation_artists_exhibitions',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'post_type' => array(
                    0 => 'exhibition',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'object',
            ),
            array(
                'key' => 'field_5f43d90e1dc5d',
                'label' => 'Related Viewing Rooms',
                'name' => 'relation_artists_vrs',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'post_type' => array(
                    0 => 'viewing-room',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'object',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'artist',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5f3e933f422b9',
        'title' => 'Contact Settings',
        'fields' => array(
            array(
                'key' => 'field_5f3e935de4395',
                'label' => 'Contact Email',
                'name' => 'contact_email',
                'type' => 'email',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_5f3e940ee3215',
                'label' => 'Contact Email Display',
                'name' => 'contact_email_display',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 2,
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_5f3e937ee4396',
                'label' => 'Facebook Profile Link',
                'name' => 'facebook_profile',
                'type' => 'url',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '34',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5f3e938de4397',
                'label' => 'Instagram Profile Link',
                'name' => 'instagram_profile_link',
                'type' => 'url',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5f3e93a1e4398',
                'label' => 'Twitter Profile Link',
                'name' => 'twitter_profile_link',
                'type' => 'url',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'mc2020',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5f3c6d4c01de7',
        'title' => 'Exhibition Extra Information',
        'fields' => array(
            array(
                'key' => 'field_5f3c6ea4182b8',
                'label' => 'Start date',
                'name' => 'start_date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '35',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'display_format' => 'd/m/Y',
                'return_format' => 'Ymd',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_5f3c7ad17e773',
                'label' => 'End date',
                'name' => 'end_date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '35',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'display_format' => 'd/m/Y',
                'return_format' => 'Ymd',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_5f3c6f8c2f2e1',
                'label' => 'Press release',
                'name' => 'press_release',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '30',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'return_format' => 'url',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5f3c6fa44fa22',
                'label' => 'Related Artists',
                'name' => 'relation_artists_exhibitions',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'post_type' => array(
                    0 => 'artist',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'object',
            ),
            array(
                'key' => 'field_5f3c70784fa24',
                'label' => 'Related Viewing Rooms',
                'name' => 'relation_exhibitions_vrs',
                'type' => 'relationship',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'post_type' => array(
                    0 => 'viewing-room',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'object',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'exhibition',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5f39af7303b43',
        'title' => 'Home Slider',
        'fields' => array(
            array(
                'key' => 'field_5f4a6ccde9823',
                'label' => 'Header text color',
                'name' => 'header_tone',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '25',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'White',
                'ui_off_text' => 'Black',
            ),
            array(
                'key' => 'field_5f4a6d5ae9825',
                'label' => 'Background color',
                'name' => 'background_color',
                'type' => 'color_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '25',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
            ),
            array(
                'key' => 'field_5f4a6d2ce9824',
                'label' => 'Height',
                'name' => 'hero_height',
                'type' => 'number',
                'instructions' => 'Height as a percentage of the window size.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '25',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => 0,
                'placeholder' => '',
                'prepend' => '',
                'append' => '%',
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ),
            array(
                'key' => 'field_5f4a6da8e9826',
                'label' => 'Autoplay speed',
                'name' => 'autoplay_speed',
                'type' => 'number',
                'instructions' => 'Slide change speed in seconds',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '25',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => 'seconds',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_5f39af7840059',
                'label' => 'Slides',
                'name' => 'slider',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'block',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5f39baed527c6',
                        'label' => 'Background image',
                        'name' => 'background',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'wpml_cf_preferences' => 1,
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key' => 'field_5f4a6e61e9827',
                        'label' => 'Overlay color',
                        'name' => 'overlay_color',
                        'type' => 'color_picker',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'wpml_cf_preferences' => 1,
                        'default_value' => '',
                    ),
                    array(
                        'key' => 'field_5f4a6e79e9828',
                        'label' => 'Overlay opacity',
                        'name' => 'overlay_opacity',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'wpml_cf_preferences' => 1,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '%',
                        'min' => 0,
                        'max' => 100,
                        'step' => '',
                    ),
                    array(
                        'key' => 'field_5f4a70ade9829',
                        'label' => 'Text color',
                        'name' => 'text_color',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'wpml_cf_preferences' => 1,
                        'message' => '',
                        'default_value' => 0,
                        'ui' => 1,
                        'ui_on_text' => 'White',
                        'ui_off_text' => 'Black',
                    ),
                    array(
                        'key' => 'field_5f4a7116e982a',
                        'label' => 'Background image size',
                        'name' => 'background_size',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'wpml_cf_preferences' => 1,
                        'message' => '',
                        'default_value' => 0,
                        'ui' => 1,
                        'ui_on_text' => 'Cover',
                        'ui_off_text' => 'Contain',
                    ),
                    array(
                        'key' => 'field_5f39afe64005a',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '100',
                            'class' => '',
                            'id' => '',
                        ),
                        'wpml_cf_preferences' => 3,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5f39afef4005b',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'wpml_cf_preferences' => 3,
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'field_5f39b0064005c',
                        'label' => 'Button',
                        'name' => 'button',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '30',
                            'class' => '',
                            'id' => '',
                        ),
                        'wpml_cf_preferences' => 1,
                        'message' => '',
                        'default_value' => 0,
                        'ui' => 1,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                    ),
                    array(
                        'key' => 'field_5f39b0294005d',
                        'label' => 'Button text',
                        'name' => 'button_text',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_5f39b0064005c',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '30',
                            'class' => '',
                            'id' => '',
                        ),
                        'wpml_cf_preferences' => 3,
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5f39b0364005e',
                        'label' => 'Button URL',
                        'name' => 'button_url',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_5f39b0064005c',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '40',
                            'class' => '',
                            'id' => '',
                        ),
                        'wpml_cf_preferences' => 1,
                        'default_value' => '',
                        'placeholder' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5ecd8ca3819c3',
        'title' => 'News Information',
        'fields' => array(
            array(
                'key' => 'field_5ecd8cbed5b2f',
                'label' => 'External link',
                'name' => 'external_link',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'wpml_cf_preferences' => 1,
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
endif;