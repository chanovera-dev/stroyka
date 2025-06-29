<?php
/**
 * Stroyka Extended Functions
 *
 * @package Stroyka
 * @since 1.0.0
 */

/**
 * Support for svg files with added security.
 */
function mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'mime_types' );

// Sanitize SVG files before uploading.
function sanitize_svg_upload( $file ) {
    // Check if the file is an SVG
    if ( isset( $file['type'] ) && $file['type'] === 'image/svg+xml' ) {
        // Get the SVG content
        $svg_content = file_get_contents( $file['tmp_name'] );

        // Remove any JavaScript or other potentially harmful content
        // This example removes all <script> and <style> tags, which are common attack vectors
        $svg_content = preg_replace( '/<\?xml.*?\?>/', '', $svg_content ); // Remove XML declaration if any
        $svg_content = preg_replace( '/<script.*?>.*?<\/script>/is', '', $svg_content ); // Remove <script> tags
        $svg_content = preg_replace( '/<style.*?>.*?<\/style>/is', '', $svg_content ); // Remove <style> tags
        $svg_content = preg_replace( '/on\w+=".*?"/', '', $svg_content ); // Remove event attributes (e.g. onclick)

        // Save the sanitized content back to the file
        file_put_contents( $file['tmp_name'], $svg_content );
    }

    return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'sanitize_svg_upload' );

/**
 * Reduce the lenght for excerpt to 21 words
 */
function reduce_excerpt_length($limit) {
    return 21;
}
add_filter('excerpt_length', 'reduce_excerpt_length', 999);

/**
 * Breadcrumbs
 */
function wp_breadcrumbs() {
    $separator = '<svg class="breadcrumb-arrow" width="6px" height="9px"><use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-right-6x9"></use></svg>';
    $home = 'Inicio';
    $showCurrent = 1;
    $showOnHome = 0;
    $current = '';

    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a>' . $separator;

    if (is_category()) {
        $thisCat = get_category(get_query_var('cat'), false);
        if ($thisCat->parent != 0) {
            $cats = get_category_parents($thisCat->parent, TRUE, $separator);
            if ($showCurrent == 0) $cats = preg_replace("#^(.+)$separator$#", "$1", $cats);
            echo $cats;
        }
        if ($showCurrent == 1) echo $current . ' ' . single_cat_title('', false);
    } elseif (is_home()) {
        echo $current . 'Últimas noticias';
    } elseif (is_page()) {
        if ($post->post_parent) {
            $ancestors = get_post_ancestors($post->ID);
            foreach ($ancestors as $ancestor) {
                $output = '<a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>' . $separator;
            }
            echo $output;
            echo $current . ' ' . get_the_title();
        } else {
            if ($showCurrent == 1) echo $current . ' ' . get_the_title();
        }
    } elseif (is_search()) {
        echo $current . ' ' . get_search_query();
    } elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $separator;
        echo get_the_time('d') . $separator;
        echo $current . ' ' . get_the_time('l');
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
        echo $current . ' ' . get_the_time('F');
    } elseif (is_year()) {
        echo $current . ' ' . get_the_time('Y');
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $separator;
            if ($showCurrent == 1) echo $current . ' ';
        } else
        {
            $cat = get_the_category();
            $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $separator);
            if ($showCurrent == 0) $cats = preg_replace("#^(.+)$separator$#", "$1", $cats);
            echo $cats;
            echo $current . ' ';
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {}
}

/**
 * Replace menu title links with submenus with buttons
 */
function custom_mobile_menu($item_output, $item, $depth, $args) {
    
    $allowed_locations = ['mobile'];

    if (!isset($args->theme_location) || !in_array($args->theme_location, $allowed_locations)) {
        return $item_output;
    }

    global $submenu_items_by_parent;
    static $checked_menus = [];

    if (!empty($args->menu) && !in_array($args->menu->term_id, $checked_menus)) {
        $menu_items = wp_get_nav_menu_items($args->menu->term_id);
        foreach ($menu_items as $menu_item) {
            $submenu_items_by_parent[$menu_item->menu_item_parent][] = $menu_item;
        }
        $checked_menus[] = $args->menu->term_id;
    }

    $has_children = !empty($submenu_items_by_parent[$item->ID]);

    if ($has_children) {
        $text = esc_html($item->title);
        $svg_icon = '<svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-down-12x7"></use></svg>';

        return '<div class="wrapper-for-submenu"><div class="text-for-submenu">' . $text . '</div><button class="button-for-submenu">' . $svg_icon . '</button></div>';
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'custom_mobile_menu', 10, 4);

function custom_top_menu($item_output, $item, $depth, $args) {
    
    $allowed_locations = ['top'];

    if (!isset($args->theme_location) || !in_array($args->theme_location, $allowed_locations)) {
        return $item_output;
    }

    global $submenu_items_by_parent;
    static $checked_menus = [];

    if (!empty($args->menu) && !in_array($args->menu->term_id, $checked_menus)) {
        $menu_items = wp_get_nav_menu_items($args->menu->term_id);
        foreach ($menu_items as $menu_item) {
            $submenu_items_by_parent[$menu_item->menu_item_parent][] = $menu_item;
        }
        $checked_menus[] = $args->menu->term_id;
    }

    $has_children = !empty($submenu_items_by_parent[$item->ID]);

    if ($has_children) {
        $text = esc_html($item->title);
        $svg_icon = '<svg class="mobile-links__item-arrow" width="7px" height="5px" class="currentColor"><use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-down-7x5"></use></svg>';

        return '<button class="button-for-submenu">' . $text  . $svg_icon . '</button>';
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'custom_top_menu', 10, 4);

function custom_bottom_menu($item_output, $item, $depth, $args) {
    
    $allowed_locations = ['primary'];

    if (!isset($args->theme_location) || !in_array($args->theme_location, $allowed_locations)) {
        return $item_output;
    }

    global $submenu_items_by_parent;
    static $checked_menus = [];

    if (!empty($args->menu) && !in_array($args->menu->term_id, $checked_menus)) {
        $menu_items = wp_get_nav_menu_items($args->menu->term_id);
        foreach ($menu_items as $menu_item) {
            $submenu_items_by_parent[$menu_item->menu_item_parent][] = $menu_item;
        }
        $checked_menus[] = $args->menu->term_id;
    }

    $has_children = !empty($submenu_items_by_parent[$item->ID]);

    if ($has_children) {
        $text = esc_html($item->title);
        $svg_icon = '<svg class="mobile-links__item-arrow" width="9px" height="6px" class="currentColor"><use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-down-9x6"></use></svg>';

        return '<div class="button-for-submenu">' . $text  . $svg_icon . '</div>';
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'custom_bottom_menu', 10, 4);

/**
 * Format Phone Number
 */
function format_phone_number($number) {
    $digits = preg_replace('/\D/', '', $number);
    if (strlen($digits) === 10) {
        return '(' . substr($digits, 0, 3) . ') ' . substr($digits, 3, 3) . '-' . substr($digits, 6);
    }
    return $number;
}

/**
 * Modify the size of the comment avatar in WordPress.
 */
function custom_comment_avatar_size($avatar) {
    // Remove existing width, height, and style attributes from the avatar
    $avatar = preg_replace('/(width|height)="\d*"\s/', '', $avatar);
    $avatar = preg_replace('/style=["\'](.*?)["\']/', '', $avatar);

    // Set a fixed width and height of 70 pixels for the avatar
    $avatar = preg_replace('/src=([\'"])((?:(?!\1).)*?)\1/', 'src=$1$2$1 width="70" height="70"', $avatar);

    return $avatar;
}
add_filter('get_avatar', 'custom_comment_avatar_size', 10, 1);

/**
 * Before icons
 */
function attachments_icons() {
    ?>
        <style>          
            :is(#contact,.contact) .menu li a[href*="tel"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/tel.svg');}
            :is(#contact,.contact) .menu li a[href*="api.whatsapp"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/whatsapp.svg');}
            :is(#contact,.contact) .menu li a[href*="mailto"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/mailto.svg');}
            :is(#contact,.contact) .menu li a[href*="schedule"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/schedule.svg');}
            :is(#contact,.contact) .menu li a[href*="address"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/address.svg');}
        
            .social .menu li a[href*="facebook"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/facebook.svg');}
            .social .menu li a[href*="twitter"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/twitter.svg');}
            .social .menu li a[href*="x.com"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/twitter.svg');}
            .social .menu li a[href*="instagram"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/instagram.svg');}
            .social .menu li a[href*="threads"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/threads.svg');}
            .social .menu li a[href*="youtube"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/youtube.svg');}
            .social .menu li a[href*="telegram"]:before {mask-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/icons/telegram.svg');}
        </style>
    <?php
}
add_action('wp_head', 'attachments_icons');

/**
 * Add support for pictures in the categories
 */
function add_category_image_field() {
    ?>
    <div class="form-field">
        <label for="category_image"><?php _e( 'Imagen de la categoría', 'textdomain' ); ?></label>
        <input type="text" name="category_image" id="category_image" value="" />
        <button class="upload_image_button button"><?php _e( 'Subir imagen', 'textdomain' ); ?></button>
    </div>
    <?php
}
add_action( 'category_add_form_fields', 'add_category_image_field' );
add_action( 'category_edit_form_fields', 'add_category_image_field' );

function save_category_image( $term_id ) {
    if ( isset( $_POST['category_image'] ) ) {
        update_term_meta( $term_id, 'category_image', sanitize_text_field( $_POST['category_image'] ) );
    }
}
add_action( 'created_category', 'save_category_image' );
add_action( 'edited_category', 'save_category_image' );

// Desactiva select2 en el checkout
add_action('wp_enqueue_scripts', function() {
  wp_dequeue_script('selectWoo');
  wp_dequeue_style('select2');
}, 20);

/**
 * Muestra las 6 categorías más populares en ventas con su información.
 */
function mostrar_categorias_mas_vendidas() {
    // Obtener las categorías ordenadas por número de ventas
    $categories = get_terms( [
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'number'     => 6,
        'orderby'    => 'count', // Ordena por cantidad de productos (no ventas reales, es una aproximación)
        'order'      => 'DESC',
    ] );

    if ( empty( $categories ) || is_wp_error( $categories ) ) {
        echo '<p>No categories found.</p>';
        return;
    }

    foreach ( $categories as $category ) {
        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
        $image_url    = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : wc_placeholder_img_src();

        // Obtener los 5 productos más vendidos de la categoría
        $args = [
            'post_type'           => 'product',
            'posts_per_page'      => 5,
            'meta_key'            => 'total_sales',
            'orderby'             => 'meta_value_num',
            'order'               => 'DESC',
            'tax_query'           => [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $category->term_id,
                ],
            ],
        ];

        $products = new WP_Query( $args );

        ?>
        <div class="category-card__body">
            <div class="category-card__image">
                <a href="<?php echo esc_url( get_term_link( $category ) ); ?>">
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $category->name ); ?>">
                </a>
            </div>
            <div class="category-card__content">
                <div class="category-card__name">
                    <a href="<?php echo esc_url( get_term_link( $category ) ); ?>">
                        <?php echo esc_html( $category->name ); ?>
                    </a>
                </div>
                <?php if ( $products->have_posts() ) : ?>
                    <ul class="category-card__links">
                        <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                <?php endif; ?>
                <div class="category-card__all">
                    <a href="<?php echo esc_url( get_term_link( $category ) ); ?>">Ver todos</a>
                </div>
            </div>
        </div>
        <?php
    }
}
