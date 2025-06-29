<?php 
/**
 * The template for displaying the blog page.
 * 
 * @package Stroyka
 * @since 1.0.0
 */
get_header(); ?>

<main id="main" class="site-main" role="main">
    <header class="block post-header">
        <div class="block">
            <section class="content top">
                <div class="breadcrumbs">
                    <?php
                        if ( function_exists('wp_breadcrumbs') ) {
                            wp_breadcrumbs( '<p id="breadcrumbs">','</p>' );
                        }
                    ?>
                </div>
            </section>
            <section class="content bottom">
                <h1 class="main-title"><?php esc_html_e( 'Últimas noticias', 'stroyka' ); ?></h1>
            </section>
        </div>
    </header><!-- .post-header -->

    <div class="block container--posts">
        <section class="content">
            <div class="posts">
                <?php

                    if ( have_posts() ) {
                        
                        while ( have_posts() ) {
                            the_post();
                            get_template_part( 'template-parts/content', 'archive' );
                        }
                        the_posts_pagination( array(
                            'mid_size'  => 2,
                            'prev_text' => '<svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px"><use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-left-8x13"></use></svg> Anterior',
                            'next_text' => 'Siguiente <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px"><use xlink:href="' . get_template_directory_uri() . '/assets/img/sprite.svg#arrow-rounded-right-8x13"></use></svg>'
                        ) );

                    } else {

                        echo '<p>' . esc_html_e( 'No posts found', 'stroyka' ) . '</p>';

                    }
                ?>
            </div>
            <?php
                if ( is_active_sidebar( 'sidebar-posts' ) ) {
                    
                    echo '
                    <aside class="wp-sidebar">';
                    dynamic_sidebar( 'sidebar-posts' ); echo '
                    </aside>';

                }
            ?>
        </section>
    </div><!-- .container--posts -->
</main><!-- #main -->

<?php get_footer(); ?>