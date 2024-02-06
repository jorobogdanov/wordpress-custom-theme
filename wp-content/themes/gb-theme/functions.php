<?php

if ( ! defined( 'GB_THEME_ASSETS_VERSION' ) ) {
    define( 'GB_THEME_ASSETS_VERSION', '0.4' );
}

function load_gb_theme_header_assets( $hook ) {
    
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array() );
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/lib/animate/animate.min.css', array() );
    wp_enqueue_style( 'owlcarousel-css', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css', array() );
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css', array() );
    wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/lib/wow/wow.min.js', GB_THEME_ASSETS_VERSION, array() );
    wp_enqueue_script( 'easing-js', get_template_directory_uri() . '/lib/easing/easing.min.js', GB_THEME_ASSETS_VERSION, array() );
    wp_enqueue_script( 'waypoints-js', get_template_directory_uri() . '/lib/waypoints/waypoints.min.js', GB_THEME_ASSETS_VERSION, array() );
    wp_enqueue_script( 'owlcarousel-js', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', GB_THEME_ASSETS_VERSION, array() );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', GB_THEME_ASSETS_VERSION, array() );

}

add_action( 'wp_enqueue_scripts', 'load_gb_theme_header_assets' );

/**
 * Add theme support for post thumbnails
 */
add_theme_support( 'post-thumbnails' );

/**
 * Register theme menus
 */
function gb_theme_register_nav_menus() {
    register_nav_menus(
        array(
            'primary_menu' => __( 'Primary menu', 'gb-theme' ),
            'quick_links'  => __( 'Quick links', 'gb-theme' ),
            'popular_links'  => __( 'Popular links', 'gb-theme' )
        )
    );
}

add_action( 'after_setup_theme', 'gb_theme_register_nav_menus' );

/**
 * Add custom classes to menus anchors
 */
function add_class_to_menu_link( $atts, $item, $args ) {

    if( property_exists( $args, 'link_class' ) ) {
        $atts['class'] = $args->link_class;
    }

    return $atts;
}

add_filter('nav_menu_link_attributes', 'add_class_to_menu_link', 1, 3);

/**
 * Add the top level menu page.
 */
function gb_theme_options_page() {
	add_menu_page(
		'GB theme',
		'GB theme Options',
		'manage_options',
		'gb-theme-options',
		'gb_theme_options_page_html'
	);
}

/**
 * Register our gb-theme_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'gb_theme_options_page' );

/**
 * Top level menu callback function
 */
function gb_theme_options_page_html() {
	// check user capabilities
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

    $gb_theme_options = get_option( 'gb-theme-options' );
    $hide_top_bar = get_option( 'gb_theme_hide_top_bar' );

    if ( ! empty( $_POST['gb_theme_save'] ) ) {

        if ( ! empty( $_POST['hide_top_bar'] ) ) {
            $hide_top_bar = esc_attr( $_POST['hide_top_bar'] );
            update_option( 'gb_theme_hide_top_bar', $hide_top_bar  );
        } else {
            delete_option( 'gb_theme_hide_top_bar' );
        }
    }

	?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <form action="" method="post">
                <div>
                    <label for="hide_top_bar">Hide top bar</label>
                    <input type="checkbox" name="hide_top_bar" <?php echo checked( $hide_top_bar, 1, true ) ?> id="hide_top_bar" value="1">
                </div>
                <div>
                    <input type="submit" value="Update me">
                </div>
                <input type="hidden" name="gb_theme_save" value="1">
            </form>
        </div>
	<?php
}