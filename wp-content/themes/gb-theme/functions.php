<?php 

function load_gb_theme_header_assets( $hook ) {
    
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css', array() );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array() );
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/lib/animate/animate.min.css', array() );
    wp_enqueue_style( 'owlcarousel-css', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css', array() );

}

add_action( 'wp_enqueue_scripts', 'load_gb_theme_header_assets' );

function load_gb_theme_footer_assets( $hook ) {

    wp_register_script( 'main-js', get_template_directory_uri() . '/js/main.js', '','1.0', true );
    wp_register_script( 'wow-js', get_template_directory_uri() . '/lib/wow/wow.min.js', '','1.0', true );
    wp_register_script( 'easing-js', get_template_directory_uri() . '/lib/easing/easing.min.js', '','1.0', true );
    wp_register_script( 'waypoints-js', get_template_directory_uri() . '/lib/waypoints/waypoints.min.js', '','1.0', true );
    wp_register_script( 'owlcarousel-js', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', '','1.0', true );
    wp_enqueue_script('main-js');
    wp_enqueue_script('wow-js');
    wp_enqueue_script('easing-js');
    wp_enqueue_script('waypoints-js');
    wp_enqueue_script('owlcarousel-js');

}

add_action( 'wp_enqueue_scripts', 'load_gb_theme_footer_assets' );

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