<?php
/**
 * Stroyka templates
 * 
 * @package Stroyka
 * @since 1.0.0
 */

/**
 * Enqueue styles for home, archive, and search pages.
 */
function posts_templates() {
    if ( is_home() || is_archive() || is_search() ) {

        // Unload block styles
        add_action( 'wp_enqueue_scripts', function() { wp_dequeue_style( 'wp-block-library' ); }, 20 );

        $styles = [
            'breadcrumbs'    => '/assets/css/breadcrumbs.css',
            'posts'          => '/assets/css/posts.css',
        ];

        if ( paginate_links() ) {
            $styles['pagination'] = '/assets/css/pagination.css';
        }

        if ( is_active_sidebar( 'sidebar-posts' ) ) {
            $styles['sidebar-posts'] = '/assets/css/sidebar.css';
        }

        foreach ( $styles as $handle => $path ) {
            wp_enqueue_style( $handle, get_template_directory_uri() . $path, [], get_asset_version( $path ), 'all' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'posts_templates' );


/**
 * Post styles for single post or single page
 */
function post_templates() {

    $enqueue_style = function( $handle, $path ) {
        wp_enqueue_style( $handle, get_template_directory_uri() . $path, [], get_asset_version( $path ), 'all' );
    };

    if ( is_single() ) {
        $styles = [
            'breadcrumbs'    => '/assets/css/breadcrumbs.css',
            'single'         => '/assets/css/single.css',
            'share'          => '/assets/css/share.css',
            'related-posts'  => '/assets/css/single/related-posts.css',
        ];

        foreach ( $styles as $handle => $path ) {
            $enqueue_style( $handle, $path );
        }

        if ( is_active_sidebar( 'sidebar-post' ) ) {
            $enqueue_style( 'single-sidebar', '/assets/css/single/with-sidebar.css' );
            $enqueue_style( 'sidebar', '/assets/css/sidebar.css' );
        }

        if ( comments_open() ) {
            $enqueue_style( 'custom-forms', '/assets/css/forms.css' );
            $enqueue_style( 'single-comments', '/assets/css/single/comments.css' );
        }
    }

    if ( is_page() ) {
        $enqueue_style( 'breadcrumbs', '/assets/css/breadcrumbs.css' );
        $enqueue_style( 'page', '/assets/css/page.css' );

        if ( has_post_thumbnail() ) {
            $enqueue_style( 'page-thumbnail', '/assets/css/page/thumbnail.css' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'post_templates' );

/**
 * Styles for error 404 page
 */
function error404_templates() {
    if ( is_404() ) {
        wp_enqueue_style( 'error404-styles', get_template_directory_uri() . '/assets/css/error404.css', array(), get_asset_version('/assets/css/error404.css'), 'all' );
    }
}
add_action( 'wp_enqueue_scripts', 'error404_templates' );

/**
 * Styles for Frontpage
 */
function frontpage_templates() {
    if ( is_front_page() or is_page_template( 'front-page.php' ) ) {
        wp_dequeue_style( 'wp-block-library' );

        /**
         * Styles and scripts
         */
        wp_enqueue_style('wc-root', get_template_directory_uri() . '/assets/css/woocommerce/wc-root.css', array(), get_asset_version('/assets/css/woocommerce/wc-root.css'), 'all'); /* var */
        wp_enqueue_style( 'frontpage', get_template_directory_uri() . '/assets/css/frontpage.css', array(), get_asset_version('/assets/css/frontpage.css'), 'all' );
        if ( have_rows( 'hero_repeater' ) ) {
            wp_enqueue_style( 'hero', get_template_directory_uri() . '/assets/css/woocommerce/frontpage/hero.css', array(), get_asset_version('/assets/css/frontpage/hero.css'), 'all' );
            wp_enqueue_script('hero-slideshow', get_template_directory_uri() . '/assets/js/woocommerce/frontpage/hero/hero-slideshow.js', array(), get_asset_version('/assets/js/woocommerce/frontpage/hero/hero-slideshow.js'), true);   
        }
        if ( have_rows( 'block_features_repeater' ) ) {
            wp_enqueue_style( 'features', get_template_directory_uri() . '/assets/css/woocommerce/frontpage/features.css', array(), get_asset_version('/assets/css/woocommerce/frontpage/features.css'), 'all' );
        }
        wp_enqueue_style('lists', get_template_directory_uri() . '/assets/css/woocommerce/wc-loop.css', array(), get_asset_version('/assets/css/woocommerce/wc-loop.css'), 'all');
        if ( $featured_products = wc_get_products( array( 'featured' => true ) ) ) {
            wp_enqueue_script('featured-products-slideshow', get_template_directory_uri() . '/assets/js/woocommerce/frontpage/featured-products/f-slideshow.js', array(), get_asset_version('/assets/js/woocommerce/frontpage/featured-products/f-slideshow.js'), true); 
        }
        wp_enqueue_style('catalog', get_template_directory_uri() . '/assets/css/woocommerce/frontpage/catalog.css', array(), get_asset_version('/assets/css/woocommerce/frontpage/catalog.css'), 'all');
        wp_enqueue_style('bestsellers', get_template_directory_uri() . '/assets/css/woocommerce/frontpage/bestsellers.css', array(), get_asset_version('/assets/css/woocommerce/frontpage/bestsellers.css'), 'all');
        wp_enqueue_style('categories', get_template_directory_uri() . '/assets/css/woocommerce/frontpage/categories.css', array(), get_asset_version('/assets/css/woocommerce/frontpage/categories.css'), 'all');
        wp_enqueue_style('arrivals', get_template_directory_uri() . '/assets/css/woocommerce/frontpage/arrivals.css', array(), get_asset_version('/assets/css/woocommerce/frontpage/arrivals.css'), 'all');
        wp_enqueue_script('arrivals-slideshow', get_template_directory_uri() . '/assets/js/woocommerce/frontpage/arrivals/a-slideshow.js', array(), get_asset_version('/assets/js/woocommerce/frontpage/arrivals/a-slideshow.js'), true); 
        if ( count( wc_get_product_ids_on_sale() ) >= 8 ) {
            wp_enqueue_style('sales', get_template_directory_uri() . '/assets/css/woocommerce/frontpage/sales.css', array(), get_asset_version('/assets/css/woocommerce/frontpage/sales.css'), 'all');
            wp_enqueue_script('sales-slideshow', get_template_directory_uri() . '/assets/js/woocommerce/frontpage/sales/s-slideshow.js', array(), get_asset_version('/assets/js/woocommerce/frontpage/sales/s-slideshow.js'), true);
        }
        if ( ! empty( get_posts() ) ) {
            wp_enqueue_style( 'posts', get_template_directory_uri() . '/assets/css/posts.css', array(), get_asset_version('/assets/css/posts.css'), 'all' );
            wp_enqueue_style( 'blog', get_template_directory_uri() . '/assets/css/frontpage/blog.css', array(), get_asset_version('/assets/css/frontpage/blog.css'), 'all' );
            wp_enqueue_script('blog-slideshow', get_template_directory_uri() . '/assets/js/frontpage/blog-slideshow.js', array(), get_asset_version('/assets/js/woocommerce/frontpage/blog-slideshow.js'), true);
        }
        // // wp_enqueue_style( 'brands', get_template_directory_uri() . '/assets/css/frontpage/brands.css', array(), get_asset_version('/assets/css/frontpage/brands.css'), 'all' );
        wp_enqueue_style( 'products', get_template_directory_uri() . '/assets/css/woocommerce/frontpage/products.css', array(), get_asset_version('/assets/css/woocommerce/frontpage/products.css'), 'all' );
    }
}
add_action( 'wp_enqueue_scripts', 'frontpage_templates' );

function contact_styles() {
    if ( is_page_template('templates/contact.php') ) {
        wp_enqueue_style('breadcrumbs', get_template_directory_uri() . '/assets/css/breadcrumbs.css', array(), get_asset_version('/assets/css/breadcrumbs.css'), 'all');
        wp_enqueue_style('contact', get_template_directory_uri() . '/assets/css/contact.css', array(), get_asset_version('/assets/css/contact.css'), 'all');
    }
}
add_action( 'wp_enqueue_scripts', 'contact_styles' );

