<?php

/**
 * Change the wrappers for the single product
 */
function contenedor_antes_single_product() { // contenedor para el single product · apertura
    echo '<div class="block summary"><div class="content">';
}
add_action('woocommerce_before_single_product', 'contenedor_antes_single_product', 12);
function contenedor_despues_single_product() { // contenedor para el single product · cierre
    echo '</div></div>';
}
add_action('woocommerce_after_single_product_summary', 'contenedor_despues_single_product', 8);

/**
 * Move the product meta
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 21);

/**
 * Move the single product price
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10); // desregistrar el precio del producto
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 21); // registrar el precio del producto en la posición 11

add_filter('woocommerce_get_price_html', 'hide_price_for_variable_products', 10, 2);
function hide_price_for_variable_products($price, $product) {
    if (is_product() && $product->is_type('variable')) {
        return ''; // Oculta el precio
    }
    return $price;
}

/**
 * Change the wrappers for the tabs
 */
function contenedor_antes_pestanas_single_product() { // contenedor para las pestañas del single product · apertura
    echo '<div class="block tabs"><div class="content">';
}
add_action('woocommerce_after_single_product_summary', 'contenedor_antes_pestanas_single_product', 9);
function contenedor_despues_pestanas_single_product() { // contenedor para las pestañas del single product · cierre
    echo '</div></div>';
}
add_action('woocommerce_after_single_product_summary', 'contenedor_despues_pestanas_single_product', 18);

/**
 * Change the number of related products
 */
function woo_related_products_limit() {
    global $product;
    
    $args['posts_per_page'] = 8;
    return $args;
    }
    add_filter( 'woocommerce_output_related_products_args', 'stroyka_related_products_args', 20 );
    function stroyka_related_products_args( $args ) {
    $args['posts_per_page'] = 8; 
    $args['columns'] = 1;
    return $args;
}

/**
 * Change the wrappers for the add to cart and wishlist buttons
 */
function contenedor_antes_carrito() { // contenedor para los botones de añadir carrito y añadir a la wishlist · apertura
    echo '<div class="cart-wishlist--wrapper">';
}
add_action('woocommerce_single_product_summary', 'contenedor_antes_carrito', 29);
function contenedor_despues_carrito() { // contenedor para los botones de añadir carrito y añadir a la wishlist · cierre
    echo '</div>';
}
add_action('woocommerce_single_product_summary', 'contenedor_despues_carrito', 32);