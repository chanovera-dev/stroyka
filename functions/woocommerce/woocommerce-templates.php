<?php

// Estilos para los archivos de la tienda
function shop_styles() {
    if ( is_shop() || is_product_category() || is_tax(get_object_taxonomies( 'product' )) ) {
        wp_enqueue_style( 'shop-styles', get_template_directory_uri() . '/assets/css/woocommerce/shop.css' );
        /* listas */
        wp_enqueue_style( 'lists-styles', get_template_directory_uri() . '/assets/css/woocommerce/lists.css' );
        /* estilos css para la paginación */
        wp_enqueue_style( 'pagination-styles', get_template_directory_uri() . '/assets/css/pagination.css' );
        /* estilos css para los formularios */
        wp_enqueue_style( 'forms-styles', get_template_directory_uri() . '/assets/css/forms.css' );
        // agrega los botones de visualizaciones de woocommerce
        add_action('woocommerce_before_main_content', 'sidebar_buttons', 24);
        function sidebar_buttons() {
        echo '
            <button id="filters-button" onclick="openSidebar()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-menu-button-wide-fill" viewBox="0 0 16 16">
                <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
            </svg>' . 
                esc_html__('Filtros', 'pinplast') . '
            </button>';
        }
        // unhook the WooCommerce wrappers
        remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
        // crea contenedores para envolver antes de el breadcrumbs hasta después de la sidebar
        add_action('woocommerce_before_main_content', 'pinplast_wrapper_start', 10);
        add_action('woocommerce_sidebar', 'pinplast_wrapper_end', 10);
        // antes del breadcrumb
        function pinplast_wrapper_start() {
            echo '<main id="main"><div class="container"><section class="section">';
        }
        // después de la sidebar original, termina en posición 10
        function pinplast_wrapper_end() {
            echo '</section></div></main>';
        }



        // abre un contenedor para la sidebar
        add_action('woocommerce_before_main_content', 'sidebar_container_start', 21);
        function sidebar_container_start() {
            echo '<aside id="sidebar-woocommerce--desktop">';
        }
        // cierra el contenedor de la sidebar
        add_action('woocommerce_before_main_content', 'sidebar_container_end', 23);
        function sidebar_container_end() {
            echo '</aside>';
        }
    }
}
add_action( 'wp_enqueue_scripts', 'shop_styles' );



// Estilos para la página de detalles de producto
add_action( 'template_redirect', 'template_redirect_action' );
function template_redirect_action() {
    if ( ! is_admin() && is_product() ) {
        add_filter( 'body_class', function ( $classes ) {
            global $post;
            $product = wc_get_product( $post->ID );
            $tipo    = $product->get_type();
            wp_enqueue_style( 'single-product-styles', get_template_directory_uri() . '/assets/css/woocommerce/single-product.css' );
            /* listas */
            wp_enqueue_style( 'lists-styles', get_template_directory_uri() . '/assets/css/woocommerce/lists.css' );
            // JS de ajustes
            wp_enqueue_script( 'ajustes', get_template_directory_uri() . '/assets/js/single-product.js', '', 1, true );
            /* estilos css para los formularios */
            wp_enqueue_style( 'forms-styles', get_template_directory_uri() . '/assets/css/forms.css' ); 
            return array_merge( $classes, array( $tipo ) );
        } );



        // unhook the WooCommerce wrappers
        remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
        // crea contenedores para envolver antes de el breadcrumbs hasta después de la sidebar
        add_action('woocommerce_before_main_content', 'pinplast_wrapper_start', 10);
        add_action('woocommerce_sidebar', 'pinplast_wrapper_end', 10);

        // antes del breadcrumb
        function pinplast_wrapper_start() {
            echo '<main id="main">';
        }
        // después de la sidebar original, termina en posición 10
        function pinplast_wrapper_end() {
            echo '</main>';
        }

        // contenedor para el breadcrumb · apertura
        function contenedor_antes_breadcrumbs() {
            echo '<div class="container"><section class="section">';
        }
        add_action('woocommerce_before_main_content', 'contenedor_antes_breadcrumbs', 19);
        // contenedor para el breadcrumb · cierre
        function contenedor_despues_breadcrumbs() {
            echo '</section></div>';
        }
        add_action('woocommerce_before_main_content', 'contenedor_despues_breadcrumbs', 21);

        // contenedor para las notificaciones · apertura
        function contenedor_antes_notificaciones() {
            echo '<div class="container notices"><section class="section">';
        }
        add_action('woocommerce_before_single_product', 'contenedor_antes_notificaciones', 5);
        // contenedor para las notificaciones · cierre
        function contenedor_despues_notificaciones() {
            echo '</section></div>';
        }
        add_action('woocommerce_before_single_product', 'contenedor_despues_notificaciones', 11);

        // contenedor para el single product · apertura
        function contenedor_antes_single_product() {
            echo '<div class="container summary"><section class="section">';
        }
        add_action('woocommerce_before_single_product', 'contenedor_antes_single_product', 12);
        // contenedor para el single product · cierre
        function contenedor_despues_single_product() {
            echo '</section></div>';
        }
        add_action('woocommerce_after_single_product_summary', 'contenedor_despues_single_product', 8);

        // desregistrar el precio del producto
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
        // registrar el precio del producto en la posición 11
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 21);



        // contenedor para las pestañas del single product · apertura
        function contenedor_antes_pestanas_single_product() {
            echo '<div class="container tabs"><section class="section">';
        }
        add_action('woocommerce_after_single_product_summary', 'contenedor_antes_pestanas_single_product', 9);
        // contenedor para las pestañas del single product · cierre
        function contenedor_despues_pestanas_single_product() {
            echo '</section></div>';
        }
        add_action('woocommerce_after_single_product_summary', 'contenedor_despues_pestanas_single_product', 18);



        // contenedor para los productos relacionados del single product · apertura
        function contenedor_antes_productos_relacionados_single_product() {
            echo '<div class="container related products"><section class="section">';
        }
        add_action('woocommerce_after_single_product_summary', 'contenedor_antes_productos_relacionados_single_product', 19);
        // contenedor para los productos relacionados del single product · cierre
        function contenedor_despues_productos_relacionados_single_product() {
            echo '</section></div>';
        }
        add_action('woocommerce_after_single_product_summary', 'contenedor_despues_productos_relacionados_single_product', 21);



        // Cantidad de productos relacionados en single product
        function woo_related_products_limit() {
            global $product;
            
            $args['posts_per_page'] = 6;
            return $args;
            }
            add_filter( 'woocommerce_output_related_products_args', 'pinplast_related_products_args', 20 );
            function pinplast_related_products_args( $args ) {
            $args['posts_per_page'] = 5; 
            $args['columns'] = 1;
            return $args;
        }



        // contenedor para los botones de añadir carrito y añadir a la wishlist · apertura
        function contenedor_antes_carrito() {
            echo '<div class="cart-wishlist--wrapper">';
        }
        add_action('woocommerce_single_product_summary', 'contenedor_antes_carrito', 29);
        // contenedor para los botones de añadir carrito y añadir a la wishlist · cierre
        function contenedor_despues_carrito() {
            echo '</div>';
        }
        add_action('woocommerce_single_product_summary', 'contenedor_despues_carrito', 32);

    }
}

// Estilos para la página cart
function cart_styles() {
    if ( is_page_template('cart.php') ) {
        wp_enqueue_style( 'cart-styles', get_template_directory_uri() . '/assets/css/woocommerce/cart.css' );
        // JS de ajustes
        wp_enqueue_script( 'ajustes-carrito', get_template_directory_uri() . '/assets/js/cart.js', '', 1, true );
    }
}
add_action( 'wp_enqueue_scripts', 'cart_styles' );

// Estilos para la página Wishlist
function wishlist_styles() {
    if ( is_page_template('wishlist-template.php') ) {
        wp_enqueue_style( 'wishlist-styles', get_template_directory_uri() . '/assets/css/woocommerce/wishlist.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'wishlist_styles' );

// Estilos para la página checkout
function checkout_styles() {
    if ( is_page_template('checkout.php') ) {
        wp_enqueue_style( 'checkout-styles', get_template_directory_uri() . '/assets/css/woocommerce/checkout.css' );
        /* estilos css para los formularios */
        wp_enqueue_style( 'forms-styles', get_template_directory_uri() . '/assets/css/forms.css' ); 
    }
}
add_action( 'wp_enqueue_scripts', 'checkout_styles' );