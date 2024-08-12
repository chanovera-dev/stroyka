<?php

// agrega un contenedor después del elemento 'li'
function abrir_contenedor_product_data() {
    echo '<div class="products-list__item">';
}
add_action('woocommerce_before_shop_loop_item', 'abrir_contenedor_product_data', 9);

// desregistrar la etiqueta 'oferta'
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
// registra la etiqueta 'sale' antes del permalink al producto
add_action('woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 9);


// desregistra el final del link al producto de woocommerce
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
// registra el final del link al producto de woocommerce al final de la fotografía del producto, en l posición 11
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11);



// agregar link del producto alrededor del título y su contenedor · $loop->post->ID · $post->ID · the_permalink()
function contenedor_link_arriba_titulo() {
    echo '<div class="product-card__info"><a class="title-wrapper product-permalink" href="' . esc_url( get_permalink(get_the_ID()) ) . '">';
}
add_action('woocommerce_shop_loop_item_title', 'contenedor_link_arriba_titulo', 9);

function link_debajo_titulo() {
    echo '</a>';
}
add_action('woocommerce_shop_loop_item_title', 'link_debajo_titulo', 11);



// Reemplaza los números de las valoraciones por iconos de estrellas
add_filter('woocommerce_get_star_rating_html', 'replace_star_ratings', 10, 2);
function replace_star_ratings($html, $rating) {
    $html = ""; // Erase default HTML
    for($i = 0; $i < 5; $i++) {
        $html .= $i < $rating ? '
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--wp--preset--color--yellow)" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
        ' : '
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--wp--preset--color--attenuated)" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
        ';
    }
    return $html;
}



// valoraciones personalizadas
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
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--wp--preset--color--attenuated)" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
            </svg>
            ';
        }

        echo '
         <span class="reviews">0 valoraciones</span>     
        </div>
        ';
    } else {}
}

add_action( 'woocommerce_after_shop_loop_item_title', 'valoraciones_personalizadas', 5 );



// mostrar solamente el precio final
    // Elimina la etiqueta de precio regular
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

    // Añade la etiqueta de precio final
     add_action('woocommerce_after_shop_loop_item_title', 'custom_display_final_price', 10);
     function custom_display_final_price() {
         global $product;
        
         // Obtiene el precio final
         // $final_price = wc_get_price_to_display($product);
         // Verifica si el producto tiene variaciones
        if ($product->is_type('variable')) {
            // Obtener los precios de las variaciones
            $prices = $product->get_variation_prices();
            // Obtener el precio más alto
            $highest_price = max($prices['price']);
        } else {
            // Si el producto no tiene variaciones, obtener el precio regular
            $highest_price = $product->get_price();
        }

         // Muestra el precio final
         echo '<span class="price">' . wc_price($highest_price) . '</span>';
     }



// crear contenedor para el botón de agregar carrito y para el de agregar a la wishlist
function contenedor_arriba_agregar_carrito() {
    echo '<div class="product-card__buttons">';
}
add_action('woocommerce_after_shop_loop_item', 'contenedor_arriba_agregar_carrito', 9);
// cerrar contenedor para el botón de agregar carrito y para el de agregar a la wishlist
function contenedor_debajo_agregar_wishlist() {
    if(is_plugin_active('yith-woocommerce-wishlist/init.php')) {
        do_shortcode( '[yith_wcwl_add_to_wishlist]' );
    }
    echo '</div>';
}
add_action('woocommerce_after_shop_loop_item', 'contenedor_debajo_agregar_wishlist', 11);



// // cierra el contenedor antes de cerrar el elemento 'li'
function cerrar_contenedor_product_data() {
    echo '</div>';
}
add_action('woocommerce_after_shop_loop_item', 'cerrar_contenedor_product_data', 12);



// Modificar texto del botón Añadir al carrito
function pinplast_woocommerce_product_add_to_cart_text() {

global $product;
$product_type = $product->product_type;

  switch ( $product_type ) {
       case 'external':
       return __( 'Ir', 'woocommerce' );
       break;
       case 'grouped':
       return __( 'Detalles', 'woocommerce' );
       break;
       case 'simple':
      return __( 'Al carrito', 'woocommerce' );
       break;
       case 'variable':
      return __( 'Opciones', 'woocommerce' );
       break;
       default:
      return __( 'Detalles', 'woocommerce' );
   }

}

add_filter( 'woocommerce_product_add_to_cart_text' , 'pinplast_woocommerce_product_add_to_cart_text' );