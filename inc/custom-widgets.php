<?php
/**
 * Stroyka custom widgets
 * 
 * @package Stroyka
 * @since 1.0.0
 */

/**
 * Custom output for wp_block_search()
 */
function custom_wp_block_search($block_content, $block) {
    if ($block['blockName'] === 'core/search') {
        ob_start();
        ?>
        <form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="block-search__button-outside block-search__text-button block-search">
            <div class="block-search__inside-wrapper">
                <input class="block-search__input" id="block-search__input-1" placeholder="<?php esc_html_e('Buscar', 'stories'); ?>" value="" type="search" name="s" required="">
                <button aria-label="<?php esc_html_e('Buscar', 'stroyka'); ?>" class="block-search__button element-button" type="submit">
                    <svg width="20px" height="20px"><use href="<?= get_template_directory_uri(); ?>/assets/img/sprite.svg#search-20"></use></svg>
                </button>
            </div>
        </form>
        <?php
        return ob_get_clean();
    }
    return $block_content;
}
add_filter('render_block', 'custom_wp_block_search', 10, 2);

/**
 * Custom output for category list in sidebar widget
 */
function custom_category_list($output, $args) {
    $categories = get_categories($args);

    $output = '';
    foreach ($categories as $category) {
        // Aquí puedes personalizar el SVG
        $svg_icon = '<svg class="widget-categories__arrow" width="6px" height="9px"><use href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-right-6x9"></use></svg>';

        $output .= '<li>';
        $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '">';
        $output .= $svg_icon . ' ' . esc_html($category->name);
        $output .= '</a>';
        $output .= '</li>';
    }
    $output .= '';

    return $output;
}
add_filter('wp_list_categories', 'custom_category_list', 10, 2);

/**
 * Add a custom output for latest posts block
 */
function custom_modify_latest_posts_block($block_content, $block) {
    // Verificamos que el bloque sea 'core/latest-posts'
    if ($block['blockName'] !== 'core/latest-posts') {
        return $block_content;
    }

    // Obtener las publicaciones recientes excluyendo formato "minientrada" e "image"
    $args = [
        'posts_per_page' => 5,
        'post_status'    => 'publish',
        'tax_query'      => [
            [
                'taxonomy' => 'post_format',
                'field'    => 'slug',
                'terms'    => ['post-format-aside', 'post-format-image'],
                'operator' => 'NOT IN'
            ]
        ]
    ];
    $recent_posts = get_posts($args);

    if (empty($recent_posts)) {
        return $block_content;
    }

    $output = '<ul class="wp-block-latest-posts__list wp-block-latest-posts">';

    foreach ($recent_posts as $post) {
        $post_id = $post->ID;
        $post_title = esc_html(get_the_title($post_id));
        $post_link = esc_url(get_permalink($post_id));
        $post_date = get_the_date('', $post_id);
        $post_thumbnail = get_the_post_thumbnail($post_id, 'thumbnail', ['class' => 'latest-post-thumbnail']);

        $output .= '<li>';
        if ($post_thumbnail) {
            $output .= '<a href="' . $post_link . '"><div class="latest-post-thumbnail-wrapper">' . $post_thumbnail . '</div></a>';
        }
        $output .= '<div class="latest-post-content"><a href="' . $post_link . '"><h4 class="wp-block-latest-posts__post-title">' . $post_title . '</h4></a>';
        $output .= '<div class="latest-post-date">' . $post_date . '</div></div>';
        $output .= '</li>';
    }

    $output .= '</ul>';

    return $output;
}
add_filter('render_block', 'custom_modify_latest_posts_block', 10, 2);