<?php
/**
 * Stroyka WooCommerce loop
 * 
 * @package Stroyka
 * @since 1.0.0
 */
 
/**
 * Crear un vínculo separado para la imagen del producto
 */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5); // desregistra el final del link al producto de woocommerce de la posición 5
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11); // registra el final del link al producto de woocommerce al final de la fotografía del producto, en la posición 11

/**
 * Crea un contenedor para todo el contenido informativo del producto
 * Crea un contenedor interno para el hiperenlace del título, la calificación y la descripción corta
 */

 function contenedor_link_arriba_titulo() {
    echo '
    <div class="product-card__info">
        <div>
            <a class="title-wrapper product-permalink" href="' . esc_url( get_permalink(get_the_ID()) ) . '">';
}
add_action('woocommerce_shop_loop_item_title', 'contenedor_link_arriba_titulo', 9);

function link_debajo_titulo() { // Cierra el hiperenlace del título
    echo '</a>';
}
add_action('woocommerce_shop_loop_item_title', 'link_debajo_titulo', 11);

/**
 * Reemplaza los números de las valoraciones por iconos de estrellas
 */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5); // Desactiva el HTML de estrellas original de WooCommerce
function replace_star_ratings($html, $rating) { // Reemplaza las estrellas con SVG personalizados
    $html = ''; // Borra HTML original
    $full_stars = floor($rating);
    for($i = 0; $i < 5; $i++) {
        $html .= $i < $full_stars ? '
            <svg class="rating__star rating__star--active" width="13px" height="12px">
                <g class="rating__fill" color="currentColor">
                    <use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#star-normal"></use>
                </g>
                <g class="rating__stroke" color="currentColor">
                    <use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#star-normal-stroke"></use>
                </g>
            </svg>
        ' : '
            <svg class="rating__star" width="13px" height="12px">
                <g class="rating__fill" color="currentColor">
                    <use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#star-normal"></use>
                </g>
                <g class="rating__stroke" color="currentColor">
                    <use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#star-normal-stroke"></use>
                </g>
            </svg>
        ';
    }
    return $html;
}
add_filter('woocommerce_get_star_rating_html', 'replace_star_ratings', 10, 2);

/**
 * Muestra las valoraciones personalizadas en la página de la tienda
 */
function valoraciones_personalizadas() {
    global $product;
    
    // Asegúrate de que $product está definido y es un objeto de producto de WooCommerce
    if ( ! is_a( $product, 'WC_Product' ) ) {
        return;
    }

    $average_rating = $product->get_average_rating();

    if ( $average_rating == 0 ) {
        echo '
        <div class="star-rating" role="img" aria-label="Valorado en ' . esc_attr( $product->get_average_rating() ) . ' de 5">
        ';

        for ( $i = 1; $i <= 5; $i++ ) {
            echo '
            <svg class="rating__star" width="13px" height="12px"><g color="currentColor" class="rating__fill"><use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#star-normal"></use></g><g class="rating__stroke" color="currentColor"><use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#star-normal-stroke"></use></g></svg>
            ';
        }

        echo '
            <span class="reviews">0 Reviews</span></div>';
        
        
    } elseif ( $average_rating > 0 ) {
        echo '
        <div class="star-rating" role="img" aria-label="Valorado en ' . esc_attr( $product->get_average_rating() ) . ' de 5">
        ';

        // Muestra las estrellas de valoración
        echo replace_star_ratings( '', $average_rating );

        // Muestra el número de valoraciones
        echo '<span class="reviews">' . esc_html( $product->get_review_count() ) . ' Reviews</span></div>';
        
    }
    
}
add_action( 'woocommerce_after_shop_loop_item_title', 'valoraciones_personalizadas', 4 );

/**
 * Mostrar excerpt del producto
 */
function mostrar_excerpt_producto() {
    // Muestra la descripción corta del producto
    if ( get_the_excerpt() ) :
        echo '
                <div class="excerpt">'; the_excerpt(); echo '</div>';
        endif;
    
        echo '
            </div>
        <div>';
}
add_action('woocommerce_after_shop_loop_item_title', 'mostrar_excerpt_producto', 5);

/**
 * Mostrar stock
 */
function mostrar_stock_antes_de_precio() {
    echo '<div class="availability">Disponible: <span>En Stock</span></div>';
}
add_action( 'woocommerce_after_shop_loop_item_title', 'mostrar_stock_antes_de_precio', 5 );

/**
 * Elimina la etiqueta de precio regular
 * Añade la etiqueta de precio final, que es el mayor precio que puede alcanzar
 */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
function custom_display_final_price() {
    global $product;

    if ($product->is_type('variable')) {
        $prices = $product->get_variation_prices();

        $regular_prices = $prices['regular_price'];
        $sale_prices = $prices['price'];

        $max_regular_price = !empty($regular_prices) ? max($regular_prices) : 0;
        $max_sale_price = !empty($sale_prices) ? max($sale_prices) : 0;

        // Si hay descuento, mostrar ambos precios
        if ($max_regular_price > $max_sale_price) {
            echo '<span class="price"><del>' . wc_price($max_regular_price) . '</del> <ins>' . wc_price($max_sale_price) . '</ins></span>';
        } else {
            echo '<span class="price">' . wc_price($max_regular_price) . '</span>';
        }
    } else {
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_price(); // Este ya es el precio final (con descuento si aplica)

        if ($regular_price > $sale_price) {
            echo '<span class="price"><del>' . wc_price($regular_price) . '</del> <ins>' . wc_price($sale_price) . '</ins></span>';
        } else {
            echo '<span class="price">' . wc_price($regular_price) . '</span>';
        }
    }
}
add_action('woocommerce_after_shop_loop_item_title', 'custom_display_final_price', 10);


/**
 * crear contenedor para el botón de agregar carrito y para el de agregar a la wishlist
 */
function contenedor_arriba_agregar_carrito() {
    echo '<div class="product-card__buttons">';
}
add_action('woocommerce_after_shop_loop_item', 'contenedor_arriba_agregar_carrito', 9);

/**
 * cierra el contenedor para el botón de agregar carrito y para el de agregar a la wishlist
 */
function contenedor_debajo_agregar_wishlist() {
    if ( class_exists('YITH_WCWL') ) {
        echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ) . '</div>';
    }
}
add_action('woocommerce_after_shop_loop_item', 'contenedor_debajo_agregar_wishlist', 11);

/**
 * cierra el contenedor antes de cerrar el elemento 'li'
 * cierra el contenedor de precio y botón de agregar al carrito
 * cierra el contenedor de información del producto
 */
 function cerrar_contenedor_product_data() {
    echo '</div></div>';
}
add_action('woocommerce_after_shop_loop_item', 'cerrar_contenedor_product_data', 12);

/**
 * Modificar texto del botón Añadir al carrito
 */
function pinplast_woocommerce_product_add_to_cart_text( $text, $product ) {

    if ( ! $product instanceof WC_Product ) {
        $product = wc_get_product( get_the_ID() );
    }

    if ( ! $product ) {
        return __( 'Detalles', 'woocommerce' );
    }

    switch ( $product->get_type() ) {
        case 'external':
            return __( 'Ir', 'woocommerce' );
        case 'grouped':
            return __( 'Detalles', 'woocommerce' );
        case 'simple':
            return __( 'Al carrito', 'woocommerce' );
        case 'variable':
            return __( 'Opciones', 'woocommerce' );
        default:
            return __( 'Detalles', 'woocommerce' );
    }
}
add_filter( 'woocommerce_product_add_to_cart_text', 'pinplast_woocommerce_product_add_to_cart_text', 10, 2 );

/**
 * Custom icons for pagination
 */
function custom_woocommerce_pagination_args($args) {
    // Define los iconos SVG que deseas usar
    $previous_icon = '
        <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px">
            <use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-left-8x13"></use>
        </svg>';

    $next_icon = '
        <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
            <use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-right-8x13"></use>
        </svg>';

    // Reemplaza el texto por los iconos SVG
    $args['prev_text'] = $previous_icon;
    $args['next_text'] = $next_icon;

    return $args;
}
add_filter('woocommerce_pagination_args', 'custom_woocommerce_pagination_args');