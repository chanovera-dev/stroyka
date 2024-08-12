<?php 
    global $post;

    // Obtener las categorías del post actual
    $post_categories = wp_get_post_categories($post->ID);

    // Obtener las etiquetas del post actual
    $post_tags = wp_get_post_tags($post->ID);

    // Combinar categorías y etiquetas en un único array
    $taxonomies = array_merge($post_categories, wp_list_pluck($post_tags, 'term_id'));

    if (!empty($taxonomies)) {
        $args = array(
            'posts_per_page' => 4,
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'category',
                    'field'    => 'id',
                    'terms'    => $post_categories,
                ),
                array(
                    'taxonomy' => 'post_tag',
                    'field'    => 'id',
                    'terms'    => $taxonomies,
                ),
            ),
            'post__not_in' => array($post->ID), // Excluir el post actual
        );

        $related_posts = get_posts($args);

        if ($related_posts) { // Verificar si hay contenidos relacionados
?>
<div class="related-posts_widget">
    <div class="title-wrapper">
        <h4 class="title"><?php echo esc_html__('Artículos relacionados', 'pinplast') ?></h4>
    </div>
    <?php 
            foreach ($related_posts as $post) :
                setup_postdata($post);

                include(TEMPLATEPATH . '/parts/widgets/related-posts/post.php');

            endforeach;
            wp_reset_postdata();
    ?>
</div>
<?php
        } // Fin del condicional de $related_posts
    } // Fin del condicional de $taxonomies
?>