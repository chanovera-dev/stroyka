<?php
/**
 * Template Name: Contacto
 */
get_header(); ?>

<main id="main" class="site-main" role="main">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.086369943894!2d-96.11554512305659!3d19.147696249714542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c3411c53b58da7%3A0xf3227b2ebd91c312!2sAv%20Urano%2026%2C%20Jardines%20de%20Mocambo%2C%2094294%20Boca%20del%20R%C3%ADo%2C%20Ver.!5e0!3m2!1ses-419!2smx!4v1699646025770!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <header class="block post-header">
        <div class="content top">
            <div class="breadcrumbs">
                <?php
                    if ( function_exists('wp_breadcrumbs') ) {
                        wp_breadcrumbs( '<p id="breadcrumbs">','</p>' );
                    }
                ?>
            </div>
        </div>
        <div class="content middle">
            <?php the_title( '<h1 class="main-title">', '</h1>' ); ?>
        </div>
    </header><!-- .post-header -->
    <div class="block">
        <div class="content bottom">
            <div>
                <h2 class="title-section"><?php esc_html_e( 'Nuestra dirección', 'stroyka' ); ?></h2>
                <?php
                    wp_nav_menu([
                        'container'       => 'nav',
                        'container_class' => 'contact',
                        'theme_location'  => 'contact',
                    ]);
                ?>
            </div>
            <div>
                <h2 class="title-section"><?php esc_html_e( 'Escríbenos', 'stroyka' ); ?></h2>
                <?php
                    the_content(); 
                ?>
            </div>
        </div>
    </div>
</main><!-- .site-main -->

<?php get_footer(); ?>