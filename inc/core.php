<?php
/**
 * Stroyka Core Functions
 *
 * @package Stroyka
 * @since 1.0.0
 */

/**
 * Theme setup function: registers menus, adds theme supports, and enables HTML5 support.
 */
function setup_stroyka() {

    // Register all theme navigation menus for different layout sections.
    register_nav_menus([
        'mobile'        => __( 'Mobile menu', 'stroyka' ),
        'top'           => __( 'Top menu on desktop', 'stroyka' ),
        'primary'       => __( 'Bottom menu on desktop', 'stroyka' ),
        'contact'       => __( 'Contact menu', 'stroyka' ),
        'information'   => __( 'Information menu', 'stroyka' ),
        'most-viewed'   => __( 'Most viewed menu', 'stroyka' ),
        'social'        => __( 'Social menu', 'stroyka' ),
    ]);

    // Enable core WordPress theme features like thumbnails and block support.
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails', [ 'post', 'page' ] );
    set_post_thumbnail_size( 350, 335, true );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );

    // Allow site logo upload with flexible dimensions.
    add_theme_support( 'custom-logo', [
        'height'      => 20,
        'width'       => 120,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // Enable HTML5 markup support for various elements.
    add_theme_support( 'html5', apply_filters( 'stroyka_html5_args', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'widgets',
        'style',
        'script',
    ]));
}
add_action( 'after_setup_theme', 'setup_stroyka' );


/**
 * Return a version number for cache busting based on file modification time.
 */
function get_asset_version( string $file_path ): int {
    $full_path = get_template_directory() . $file_path;
    return file_exists( $full_path ) ? filemtime( $full_path ) : time();
}


/**
 * Load global CSS styles into the site header.
 */
function load_on_header() {
    $uri = get_template_directory_uri();
    
    // Encolar estilos base
    $styles = [
        'global'       => '/style.css',
        'root'         => '/assets/css/wp-root.css',
        'custom-forms' => '/assets/css/forms.css',
    ];

    foreach ( $styles as $handle => $path ) {
        wp_enqueue_style( $handle, $uri . $path, [], get_asset_version( $path ), 'all' );
    }

    $locations = get_nav_menu_locations();
    $top_menu_id = $locations['top'] ?? null;
    if ( $top_menu_id && wp_get_nav_menu_items( $top_menu_id ) ) {
        wp_enqueue_script( 'top-menu-scripts', "$uri/assets/js/header/top-menu.js", [], get_asset_version( '/assets/js/header/top-menu.js' ), true );
        wp_enqueue_style( 'top-menu-styles', "$uri/assets/css/header/top-menu.css", [], get_asset_version( '/assets/css/header/top-menu.css' ), 'all' );
    }

    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_script('woocommerce-scripts', "$uri/assets/js/woocommerce/wc-global.js", [], get_asset_version('/assets/js/woocommerce/wc-global.js'), true);
        wp_enqueue_style('wc-root', "$uri/assets/css/woocommerce/wc-root.css", [], get_asset_version('/assets/css/woocommerce/wc-root.css'), 'all');
        wp_enqueue_style('woocommerce-styles', "$uri/assets/css/woocommerce/wc-global.css", [], get_asset_version('/assets/css/woocommerce/wc-global.css'), 'all');
    }
}
add_action( 'wp_enqueue_scripts', 'load_on_header' );



/**
 * Enqueue JavaScript and CSS assets for the theme footer.
 */
function load_on_footer() {
    $uri = get_template_directory_uri() . '/assets';

    wp_enqueue_script('svg4everybody', "$uri/js/svg4everybody.min.js", [], '1.0', true);
    wp_enqueue_script('global', "$uri/js/global.js", [], get_asset_version('/assets/js/global.js'), true);

    if (is_user_logged_in()) {
        wp_enqueue_style('has-login', "$uri/css/has-login.css", [], get_asset_version('/assets/css/has-login.css'), 'all');
    }   
}
add_action( 'wp_footer', 'load_on_footer' );

/**
 * Register custom widget areas for blog and post sidebars.
 */
function widgets_areas() {

    register_sidebar(
        array(
            'name'          => __( 'Sidebar Blog', 'stroyka' ),
            'id'            => 'sidebar-posts',
            'before_widget' => '',
            'after_widget'  => '',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Sidebar Post', 'stroyka' ),
            'id'            => 'sidebar-post',
            'before_widget' => '',
            'after_widget'  => '',
        )
    );

}
add_action( 'widgets_init', 'widgets_areas' );