<?php

/**
 * Saber si el producto tiene galería
 */
function product_has_gallery( $product ) {
    if ( is_numeric( $product ) ) {
        $product = wc_get_product( $product );
    }

    if ( ! $product instanceof WC_Product ) {
        return false;
    }

    $gallery_image_ids = $product->get_gallery_image_ids();

    return ! empty( $gallery_image_ids );
}

/**
 * Saber si el producto tiene productos relacionados
 */
function tiene_productos_relacionados($product_id) {
    $product = wc_get_product($product_id);
    if (!$product) return false;

    $related = wc_get_related_products($product_id, 8); // número máximo que mostrarás
    return !empty($related);
}

function contenedor_antes_productos_relacionados_single_product() {
    global $product;

    if (!$product || !tiene_productos_relacionados($product->get_id())) return;

    echo '
    <div class="container">
        <section class="section related-products-slideshow loading">
            <div class="slideshow-buttons">
                <button id="related-products--backward-button" class="backward-button slideshow-button">
                    <svg width="7px" height="11px"><use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-left-7x11"></use></svg>
                </button>
                <button id="related-products--forward-button" class="forward-button slideshow-button">
                    <svg width="7px" height="11px"><use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-right-7x11"></use></svg>
                </button>
            </div>
            ';
}
add_action('woocommerce_after_single_product_summary', 'contenedor_antes_productos_relacionados_single_product', 19);

function contenedor_despues_productos_relacionados_single_product() {
    global $product;

    if (!$product || !tiene_productos_relacionados($product->get_id())) return;

    echo '
        </section>
    </div>';
}
add_action('woocommerce_after_single_product_summary', 'contenedor_despues_productos_relacionados_single_product', 21);