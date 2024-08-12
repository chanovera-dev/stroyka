<?php

// Agrega soporte para woocommerce
function soporte_woocommerce(){ add_theme_support( 'woocommerce' ); }
add_action( 'after_setup_theme', 'soporte_woocommerce' );



add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );



//Disable all woocommerce stylesheets
add_filter( 'woocommerce_enqueue_styles', '__return_false' );



// cambia el separador del breadcrumbs de woocommerce
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = '
            <svg class="breadcrumb-arrow" width="6px" height="9px">
                <use xlink:href="'.get_template_directory_uri().'/assets/img/sprite.svg#arrow-rounded-right-6x9"></use>
            </svg>';
	return $defaults;
}



// mostrar el carrito en tiempo real
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

    echo '
	<a class="counter cart-customlocation" href="'; echo esc_url(wc_get_cart_url()); echo '">
        <svg width="20px" height="20px">
            <use xlink:href="'.get_template_directory_uri().'/assets/img/sprite.svg#cart-20"></use>
        </svg>
        <div class="wrapper"><span class="number">'; echo sprintf ( WC()->cart->get_cart_contents_count() );  echo'</span></div>
    </a>';
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}



// Crea una lista de las categorías y subcategorías de woocommerce
function obtener_categorias_woocommerce() {
    $args = array(
        'taxonomy'     => 'product_cat',
        'orderby'      => 'name',
        'show_count'   => 0,
        'pad_counts'   => 0,
        'hierarchical' => 1,
        'title_li'     => '',
        'hide_empty'   => 0,
    );

    $categorias = get_categories($args);

    if (!empty($categorias)) {
        echo '<ul id="categories-list" class="categories-list">';
        foreach ($categorias as $categoria) {
            // Omitir la categoría "Sin categorizar"
            if ($categoria->name == 'Sin categorizar') {
                continue;
            }

            if ($categoria->name == 'Uncategorized') {
                continue;
            }

            $categoria_link = get_term_link($categoria->term_id, 'product_cat');
            echo '<li><a href="' . esc_url($categoria_link) . '">' . $categoria->name . '</a>';

            // Obtener subcategorías de la categoría actual
            $subcategorias = get_terms('product_cat', array(
                'parent'     => $categoria->term_id,
                'hide_empty' => false,
            ));

            if (!empty($subcategorias)) {
                echo '<ul>';
                foreach ($subcategorias as $subcategoria) {
                    $subcategoria_link = get_term_link($subcategoria->term_id, 'product_cat');
                    echo '<li><a href="' . esc_url($subcategoria_link) . '">' . $subcategoria->name . '</a></li>';
                }
                echo '</ul>';
            }

            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No hay categorías disponibles.';
    }
}



// C O N T E N E D O R E S   P A R A   W O O C O M M E R C E

// crea un sidebar llamado woocommerce, da de baja la sidebar original y toma su lugar
function stroyka_widgets_init() {
    register_sidebar( array(
        'name'          => 'WooCommerce Sidebar',
        'id'            => 'woocommerce_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'stroyka_widgets_init' );


 
// suplantando la sidebar de woocommerce
add_action( 'wp', function() {
    // remueve la sidebar original
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

    // agrega la sidebar en las páginas de tienda, archivo, etc.
    if ( is_shop() || is_product_category() || is_tax(get_object_taxonomies( 'product' )) ) {
        // agrega la nueva sidebar en la posición 22
        add_action( 'woocommerce_before_main_content', function() {
            if ( is_active_sidebar( 'woocommerce_sidebar' ) ) {
                dynamic_sidebar( 'woocommerce_sidebar' );
            } else {
                get_sidebar( 'woocommerce' );
            }
        }, 22 );
    }
} );



// A N E X O S
// Estilos particulares para los templates
require_once(get_template_directory() . '/functions/woocommerce/woocommerce-templates.php');
// Anexo para definir los contenedores de las listas de productos
require_once(get_template_directory() . '/functions/woocommerce/woocommerce-loop.php');