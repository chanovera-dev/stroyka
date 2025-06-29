<?php

/**
 * Unhook default WooCommerce wrappers
 * (We’ll replace them with custom markup)
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Add custom <main> wrapper around main WooCommerce content
 * (Starts before breadcrumbs, ends after sidebar)
 */
add_action( 'woocommerce_before_main_content', 'custom_wrapper_open', 10 );
add_action( 'woocommerce_sidebar', 'custom_wrapper_close', 10 );

function custom_wrapper_open() {
    echo '<main id="main" class="site-main" role="main">';
}

function custom_wrapper_close() {
    echo '</main><!-- .site-main -->';
}

/**
 * Open and close wrapper around breadcrumbs section
 */
add_action( 'woocommerce_before_main_content', 'breadcrumb_wrapper_open', 19 );
add_action( 'woocommerce_before_main_content', 'breadcrumb_wrapper_close', 21 );

function breadcrumb_wrapper_open() {
    echo '<div class="block"><div class="content">';
}

function breadcrumb_wrapper_close() {
    echo '</div></div>';
}

/**
 * Open and close wrapper around WooCommerce notices
 */
add_action( 'woocommerce_before_single_product', 'notices_wrapper_open', 5 );
add_action( 'woocommerce_before_single_product', 'notices_wrapper_close', 11 );

function notices_wrapper_open() {
    echo '<div class="block notices"><div class="content">';
}

function notices_wrapper_close() {
    echo '</div></div>';
}