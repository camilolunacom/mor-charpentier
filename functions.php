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
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'mc2020' ),
		) );

        add_image_size( 'news', 350, 210, true );

    }
    add_action( 'after_setup_theme', 'mc2020_theme_setup' );

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
            'menu_icon' => 'data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZGF0YS1wcmVmaXg9ImZhcyIgZGF0YS1pY29uPSJ1c2VycyIgY2xhc3M9InN2Zy1pbmxpbmUtLWZhIGZhLXVzZXJzIGZhLXctMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDY0MCA1MTIiPjxwYXRoIGZpbGw9ImN1cnJlbnRDb2xvciIgZD0iTTk2IDIyNGMzNS4zIDAgNjQtMjguNyA2NC02NHMtMjguNy02NC02NC02NC02NCAyOC43LTY0IDY0IDI4LjcgNjQgNjQgNjR6bTQ0OCAwYzM1LjMgMCA2NC0yOC43IDY0LTY0cy0yOC43LTY0LTY0LTY0LTY0IDI4LjctNjQgNjQgMjguNyA2NCA2NCA2NHptMzIgMzJoLTY0Yy0xNy42IDAtMzMuNSA3LjEtNDUuMSAxOC42IDQwLjMgMjIuMSA2OC45IDYyIDc1LjEgMTA5LjRoNjZjMTcuNyAwIDMyLTE0LjMgMzItMzJ2LTMyYzAtMzUuMy0yOC43LTY0LTY0LTY0em0tMjU2IDBjNjEuOSAwIDExMi01MC4xIDExMi0xMTJTMzgxLjkgMzIgMzIwIDMyIDIwOCA4Mi4xIDIwOCAxNDRzNTAuMSAxMTIgMTEyIDExMnptNzYuOCAzMmgtOC4zYy0yMC44IDEwLTQzLjkgMTYtNjguNSAxNnMtNDcuNi02LTY4LjUtMTZoLTguM0MxNzkuNiAyODggMTI4IDMzOS42IDEyOCA0MDMuMlY0MzJjMCAyNi41IDIxLjUgNDggNDggNDhoMjg4YzI2LjUgMCA0OC0yMS41IDQ4LTQ4di0yOC44YzAtNjMuNi01MS42LTExNS4yLTExNS4yLTExNS4yem0tMjIzLjctMTMuNEMxNjEuNSAyNjMuMSAxNDUuNiAyNTYgMTI4IDI1Nkg2NGMtMzUuMyAwLTY0IDI4LjctNjQgNjR2MzJjMCAxNy43IDE0LjMgMzIgMzIgMzJoNjUuOWM2LjMtNDcuNCAzNC45LTg3LjMgNzUuMi0xMDkuNHoiLz48L3N2Zz4=',
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
            'menu_icon' => 'data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZGF0YS1wcmVmaXg9ImZhZCIgZGF0YS1pY29uPSJwaG90by12aWRlbyIgY2xhc3M9InN2Zy1pbmxpbmUtLWZhIGZhLXBob3RvLXZpZGVvIGZhLXctMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDY0MCA1MTIiPjxnIGNsYXNzPSJmYS1ncm91cCI+PHBhdGggY2xhc3M9ImZhLXNlY29uZGFyeSIgZmlsbD0iY3VycmVudENvbG9yIiBkPSJNNjA4IDBIMTYwYTMyIDMyIDAgMDAtMzIgMzJ2OTZoMTYwVjY0aDE5MnYzMjBoMTI4YTMyIDMyIDAgMDAzMi0zMlYzMmEzMiAzMiAwIDAwLTMyLTMyek0yMzIgMTAzYTkgOSAwIDAxLTkgOWgtMzBhOSA5IDAgMDEtOS05VjczYTkgOSAwIDAxOS05aDMwYTkgOSAwIDAxOSA5em0zNTIgMjA4YTkgOSAwIDAxLTkgOWgtMzBhOSA5IDAgMDEtOS05di0zMGE5IDkgMCAwMTktOWgzMGE5IDkgMCAwMTkgOXptMC0xMDRhOSA5IDAgMDEtOSA5aC0zMGE5IDkgMCAwMS05LTl2LTMwYTkgOSAwIDAxOS05aDMwYTkgOSAwIDAxOSA5em0wLTEwNGE5IDkgMCAwMS05IDloLTMwYTkgOSAwIDAxLTktOVY3M2E5IDkgMCAwMTktOWgzMGE5IDkgMCAwMTkgOXoiIG9wYWNpdHk9Ii40Ii8+PHBhdGggY2xhc3M9ImZhLXByaW1hcnkiIGZpbGw9ImN1cnJlbnRDb2xvciIgZD0iTTQxNiAxNjBIMzJhMzIgMzIgMCAwMC0zMiAzMnYyODhhMzIgMzIgMCAwMDMyIDMyaDM4NGEzMiAzMiAwIDAwMzItMzJWMTkyYTMyIDMyIDAgMDAtMzItMzJ6TTk2IDIyNGEzMiAzMiAwIDExLTMyIDMyIDMyIDMyIDAgMDEzMi0zMnptMjg4IDIyNEg2NHYtMzJsNjQtNjQgMzIgMzIgMTI4LTEyOCA5NiA5NnoiLz48L2c+PC9zdmc+',
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
            'menu_icon' => 'data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZGF0YS1wcmVmaXg9ImZhcyIgZGF0YS1pY29uPSJwZXJzb24tYm9vdGgiIGNsYXNzPSJzdmctaW5saW5lLS1mYSBmYS1wZXJzb24tYm9vdGggZmEtdy0xOCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNTc2IDUxMiI+PHBhdGggZmlsbD0iY3VycmVudENvbG9yIiBkPSJNMTkyIDQ5NmMwIDguOCA3LjIgMTYgMTYgMTZoMzJjOC44IDAgMTYtNy4yIDE2LTE2VjMyMGgtNjR2MTc2em0zMi0yNzJoLTUwLjlsLTQ1LjItNDUuM0MxMTUuOCAxNjYuNiA5OS43IDE2MCA4Mi43IDE2MEg2NGMtMTcuMSAwLTMzLjIgNi43LTQ1LjMgMTguOEM2LjcgMTkwLjkgMCAyMDcgMCAyMjQuMUwuMiAzMjAgMCA0ODBjMCAxNy43IDE0LjMgMzIgMzEuOSAzMiAxNy42IDAgMzItMTQuMyAzMi0zMmwuMS0xMDAuN2MuOS41IDEuNiAxLjMgMi41IDEuN2wyOS4xIDQzdjU2YzAgMTcuNyAxNC4zIDMyIDMyIDMyczMyLTE0LjMgMzItMzJ2LTU2LjVjMC05LjktMi4zLTE5LjgtNi43LTI4LjZsLTQxLjItNjEuM1YyNTNsMjAuOSAyMC45YzkuMSA5LjEgMjEuMSAxNC4xIDMzLjkgMTQuMUgyMjRjMTcuNyAwIDMyLTE0LjMgMzItMzJzLTE0LjMtMzItMzItMzJ6TTY0IDEyOGMyNi41IDAgNDgtMjEuNSA0OC00OFM5MC41IDMyIDY0IDMyIDE2IDUzLjUgMTYgODBzMjEuNSA0OCA0OCA0OHptMjI0LTk2bDMxLjUgMjIzLjEtMzAuOSAxNTQuNmMtNC4zIDIxLjYgMTMgMzguMyAzMS40IDM4LjMgMTUuMiAwIDI4LTkuMSAzMi4zLTMwLjQuOSAxNi45IDE0LjYgMzAuNCAzMS43IDMwLjQgMTcuNyAwIDMyLTE0LjMgMzItMzIgMCAxNy43IDE0LjMgMzIgMzIgMzJzMzItMTQuMyAzMi0zMlYwSDI4OHYzMnptLTk2IDB2MTYwaDY0VjBoLTMyYy0xNy43IDAtMzIgMTQuMy0zMiAzMnpNNTQ0IDBoLTMydjQ5NmMwIDguOCA3LjIgMTYgMTYgMTZoMzJjOC44IDAgMTYtNy4yIDE2LTE2VjMyYzAtMTcuNy0xNC4zLTMyLTMyLTMyeiIvPjwvc3ZnPg==',
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
				'thumbnail',
			),
            'public' => true,
            'menu_position' => 9,
            'menu_icon' => 'data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZGF0YS1wcmVmaXg9ImZhcyIgZGF0YS1pY29uPSJpbWFnZSIgY2xhc3M9InN2Zy1pbmxpbmUtLWZhIGZhLWltYWdlIGZhLXctMTYiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDUxMiA1MTIiPjxwYXRoIGZpbGw9ImN1cnJlbnRDb2xvciIgZD0iTTQ2NCA0NDhINDhjLTI2LjUxIDAtNDgtMjEuNDktNDgtNDhWMTEyYzAtMjYuNTEgMjEuNDktNDggNDgtNDhoNDE2YzI2LjUxIDAgNDggMjEuNDkgNDggNDh2Mjg4YzAgMjYuNTEtMjEuNDkgNDgtNDggNDh6TTExMiAxMjBjLTMwLjkyOCAwLTU2IDI1LjA3Mi01NiA1NnMyNS4wNzIgNTYgNTYgNTYgNTYtMjUuMDcyIDU2LTU2LTI1LjA3Mi01Ni01Ni01NnpNNjQgMzg0aDM4NFYyNzJsLTg3LjUxNS04Ny41MTVjLTQuNjg2LTQuNjg2LTEyLjI4NC00LjY4Ni0xNi45NzEgMEwyMDggMzIwbC01NS41MTUtNTUuNTE1Yy00LjY4Ni00LjY4Ni0xMi4yODQtNC42ODYtMTYuOTcxIDBMNjQgMzM2djQ4eiIvPjwvc3ZnPg==',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => false,
		);
        register_post_type( 'artwork', $artwork_args );

    }
    add_action( 'init', 'custom_post_types', 0 );

}  // custom_post_typ es

// Setup widget areas.
if ( ! function_exists( 'mc2020_widgets_init' ) ) {

    function mc2020_widgets_init() {

        $args = array(
            'name' => esc_html__( 'News Sidebar', 'mc2020' ),
            'id' => 'news-sidebar',
            'description' => esc_html__( 'Add widgets for news sidebar.', 'mc2020' ),
            'before_widget' => '<section class="widget">',
            'class' => 'news-sidebar',
            'after_widget' => '</section>',
            'before_title' => '<h2 class=news-sidebar__title">',
            'after_title' => '</h2>',
	);
        register_sidebar( $args );

    }
    add_action( 'widgets_init', 'mc2020_widgets_init' );

} // mc2020_widgets_init

/**
 * Load JS and CSS
 */

function mc2020_enqueue_scripts() {
    wp_enqueue_style( 'mc2020-normalize', get_stylesheet_directory_uri() . '/assets/css/normalize.css', [], '8.0.1' );
    wp_enqueue_style( 'mc2020-main', get_stylesheet_directory_uri() . '/style.css', ['mc2020-normalize'], time() );

    if ( is_front_page() ) {
        wp_enqueue_script( 'mc2020-glide', get_stylesheet_directory_uri() . '/assets/js/glide.min.js', [], '3.4.1', true );
        wp_enqueue_style( 'mc2020-glide-core', get_stylesheet_directory_uri() . '/assets/css/glide.core.min.css', [], '3.4.1' );
        wp_enqueue_script( 'mc2020-home', get_stylesheet_directory_uri() . '/assets/js/home.js', ['mc2020-glide'], time(), true );
    }

}
add_action( 'wp_enqueue_scripts', 'mc2020_enqueue_scripts' );
