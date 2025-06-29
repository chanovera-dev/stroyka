<?php
/**
 * Stroyka WooCommerce templates
 * 
 * @package Stroyka
 * @since 1.0.0
 */

function shop_styles() {
    if ( is_shop() || is_product_category() || is_tax( get_object_taxonomies( 'product' ) ) ) {

        foreach ([
            '/functions/woocommerce/shop/shop-wrappers.php',
            '/functions/woocommerce/shop/shop-functions.php'
        ] as $file) {
            $path = get_template_directory() . $file;
            if ( file_exists( $path ) ) {
                include_once $path;
            }
        }

        $uri = get_template_directory_uri();
        $styles = [
            'wc-root'                => '/assets/css/woocommerce/wc-root.css',
            'wc-breadcrumbs'         => '/assets/css/woocommerce/wc-breadcrumbs.css',
            'wc-shop'                => '/assets/css/woocommerce/shop.css',
            'lists'                  => '/assets/css/woocommerce/wc-loop.css',
            'woocommerce-pagination' => '/assets/css/woocommerce/wc-pagination.css',
        ];

        foreach ( $styles as $handle => $path ) {
            wp_enqueue_style( $handle, $uri . $path, [], get_asset_version( $path ), 'all' );
        }

        wp_enqueue_script( 'shop', $uri . '/assets/js/woocommerce/shop.js', [], get_asset_version( '/assets/js/woocommerce/shop.js' ), true );
    }
}
add_action( 'wp_enqueue_scripts', 'shop_styles' );

function product_styles() {
    if ( ! is_admin() && is_product() ) {

        function include_template_file( $relative_path ) {
            $path = get_template_directory() . $relative_path;
            if ( file_exists( $path ) ) {
                include_once $path;
            }
        }

        include_template_file( '/functions/woocommerce/product/product-wrappers.php' ); // Change the product wrappers
        include_template_file( '/functions/woocommerce/product/product-functions.php' ); // Functions for Single Product 

        add_filter( 'body_class', function ( $classes ) {
            global $post;

            $product = wc_get_product( $post->ID );
            $type    = $product->get_type();

            $assets = [
                'styles' => [
                    'wc-root'         => '/assets/css/woocommerce/wc-root.css',
                    'wc-breadcrumbs'  => '/assets/css/woocommerce/wc-breadcrumbs.css',
                    'single-product'  => '/assets/css/woocommerce/single-product.css',
                    'custom-forms'    => '/assets/css/forms.css',
                    'lists'           => '/assets/css/woocommerce/wc-loop.css',
                ],
                'scripts' => [
                    'qty'             => '/assets/js/woocommerce/single-product/qty.js',
                ]
            ];

            foreach ( $assets['styles'] as $handle => $path ) {
                wp_enqueue_style( $handle, get_template_directory_uri() . $path, [], get_asset_version( $path ), 'all' );
            }

            foreach ( $assets['scripts'] as $handle => $path ) {
                wp_enqueue_script( $handle, get_template_directory_uri() . $path, [], get_asset_version( $path ), true );
            }

            // Style based on gallery presence
            $gallery_suffix = product_has_gallery( $product ) ? 'has-gallery' : 'no-has-gallery';
            $gallery_path = "/assets/css/woocommerce/single-product/$gallery_suffix.css";

            wp_enqueue_style( "single-product-$gallery_suffix", get_template_directory_uri() . $gallery_path, [], get_asset_version( $gallery_path ), 'all' );

            // Related products styles and script
            if ( tiene_productos_relacionados( $product->get_id() ) ) {
                $related_path = '/assets/css/woocommerce/single-product/related-products.css';
                wp_enqueue_style( 'related-products', get_template_directory_uri() . $related_path, [], get_asset_version( $related_path ), 'all' );

                $slideshow_path = '/assets/js/woocommerce/single-product/slideshow.js';
                wp_enqueue_script( 'slideshow', get_template_directory_uri() . $slideshow_path, [], get_asset_version( $slideshow_path ), true );
            }

            return array_merge( $classes, [ $type ] );
        });
    }
}
add_action( 'template_redirect', 'product_styles' );

function cart_styles() {
    if ( is_page_template('templates/cart.php') ) {
        wp_enqueue_style('wc-breadcrumbs', get_template_directory_uri() . '/assets/css/woocommerce/wc-breadcrumbs.css', array(), get_asset_version('/assets/css/woocommerce/wc-breadcrumbs.css'), 'all');
        wp_enqueue_style('cart', get_template_directory_uri() . '/assets/css/woocommerce/cart.css', array(), get_asset_version('/assets/css/woocommerce/cart.css'), 'all');
        wp_enqueue_script('assets-cart', get_template_directory_uri() . '/assets/js/woocommerce/cart/cart.js', array(), get_asset_version('/assets/js/woocommerce/cart/cart.js'), true);
    }
}
add_action( 'wp_enqueue_scripts', 'cart_styles' );

function checkout_styles() {
    if ( is_page_template('templates/checkout.php') ) {
        wp_enqueue_style('wc-breadcrumbs', get_template_directory_uri() . '/assets/css/woocommerce/wc-breadcrumbs.css', array(), get_asset_version('/assets/css/woocommerce/wc-breadcrumbs.css'), 'all');
        wp_enqueue_style('checkout', get_template_directory_uri() . '/assets/css/woocommerce/checkout.css', array(), get_asset_version('/assets/css/woocommerce/checkout.css'), 'all');
    }
}
add_action( 'wp_enqueue_scripts', 'checkout_styles' );
