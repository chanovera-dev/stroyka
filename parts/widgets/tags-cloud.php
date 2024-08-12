<?php

$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'post_tag',
            'field' => 'id',
            'terms' => get_terms( 'post_tag', array( 'fields' => 'ids' ) ),
        ),
    ),
);

$query = new WP_Query( $args );

if ( function_exists( 'wp_tag_cloud' ) && $query->have_posts() ) :
    echo '<h2>' . esc_html__('Nube de etiquetas', 'pinplast') . '</h2><div>';
    wp_tag_cloud( array(
        'smallest'  => 1.3,
        'largest'   => 1.3,
        'unit'      => 'rem',
        'orderby'   => 'name',
        'order'     => 'ASC',
        'exclude'   => 6
    ) );
    echo '</div>';
endif;

wp_reset_postdata();