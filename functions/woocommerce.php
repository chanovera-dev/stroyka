<?php
/**
 * Stroyka WooCommerce functions
 * 
 * @package Stroyka
 * @since 1.0.0
 */

 if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}

/**
 * Add WooCommerce Support
 */
function support_woocommerce() { 
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'support_woocommerce' );

/**
 * Add theme support for the Gallery Zoom, Lightbox and Slider
 */
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/**
 * Disable all woocommerce stylesheets
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Show the Cart in real time
 */
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
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

/**
 * Get Woocommerce categories for the shop by category button
 */
function get_woocommerce_categories() {
    $args = array(
        'taxonomy'     => 'product_cat',
        'orderby'      => 'name',
        'show_count'   => 0,
        'pad_counts'   => 0,
        'hierarchical' => 1,
        'title_li'     => '',
        'hide_empty'   => 0,
    );

    $categories = get_categories($args);

    if (!empty($categories)) {
        echo '<ul id="categories-list" class="categories-list" style="display:none">';
        foreach ($categories as $category) {
            // Skip the "Uncategorized" category (in both English and Spanish just in case)
            if ($category->name == 'Uncategorized' || $category->name == 'Sin categorizar') {
                continue;
            }

            $category_link = get_term_link($category->term_id, 'product_cat');
            echo '<li><a href="' . esc_url($category_link) . '">' . $category->name . '</a>';

            // Get subcategories of the current category
            $subcategories = get_terms('product_cat', array(
                'parent'     => $category->term_id,
                'hide_empty' => false,
            ));

            if (!empty($subcategories)) {
                echo '<ul>';
                foreach ($subcategories as $subcategory) {
                    $subcategory_link = get_term_link($subcategory->term_id, 'product_cat');
                    echo '<li><a href="' . esc_url($subcategory_link) . '">' . $subcategory->name . '</a></li>';
                }
                echo '</ul>';
            }

            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No categories available.';
    }
}

/**
 * Change the breadcrumbs separator for woocommerce
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = '
            <svg class="breadcrumb-arrow" width="6px" height="9px">
                <use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-right-6x9"></use>
            </svg>';
	return $defaults;
}

/**
 * Supplant the original WooCommerce Sidebar
 */
function stroyka_widgets_init() {

    register_sidebar( array(
        'name'          => 'WooCommerce Sidebar',
        'id'            => 'woocommerce_sidebar',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );

}
add_action( 'widgets_init', 'stroyka_widgets_init' );

add_action( 'wp', function() {
    // remove the original sidebar
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

/**
 * Annexes for WooCommerce
 */
function stroyka_load_woocommerce_annexes() {
    $files = [
        '/functions/woocommerce/wc-templates.php',
        '/functions/woocommerce/wc-loop.php',
        '/functions/woocommerce/single-product.php',
        '/functions/woocommerce/wishlist.php',
    ];

    foreach ( $files as $file ) {
        $path = get_template_directory() . $file;
        if ( file_exists( $path ) ) {
            require_once $path;
        } else {
            error_log( "Archivo no encontrado: {$path}" );
        }
    }
}
add_action('after_setup_theme', 'stroyka_load_woocommerce_annexes');

/** 
 * Button Filter_Title_Widget
 */
class Filter_Title_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'filter_title_widget',
            __('Título de Filtro', 'textdomain'),
            ['description' => __('Un botón con texto e ícono SVG para filtros', 'textdomain')]
        );
    }

    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Filtrar', 'textdomain');
        $icon_url = get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-down-12x7';

        echo $args['before_widget'];
        ?>
        <button class="filter__title">
            <?php echo esc_html($title); ?>
            <svg class="filter__arrow" width="12px" height="7px">
                <use xlink:href="<?php echo esc_url($icon_url); ?>"></use>
            </svg>
        </button>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Filtrar', 'textdomain');
        $icon_url = get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-down-12x7';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Texto del botón:', 'textdomain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p><strong><?php _e('Vista previa:', 'textdomain'); ?></strong></p>
        <button class="filter__title" disabled style="pointer-events: none; opacity: .7;">
            <?php echo esc_html($title); ?>
            <svg class="filter__arrow" width="12px" height="7px">
                <use xlink:href="<?php echo esc_url($icon_url); ?>"></use>
            </svg>
        </button>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['title'] = sanitize_text_field($new_instance['title']);
        return $instance;
    }
}
function register_filter_title_widget() {
    register_widget('Filter_Title_Widget');
}
add_action('widgets_init', 'register_filter_title_widget');