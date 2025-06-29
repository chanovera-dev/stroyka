<?php
/**
 * 404 Page Template
 * 
 * @package Stroyka
 * @since 1.0.0
 */
get_header(); ?>

<main id="main" class="site-main" role="main">
    <header class="container">
        <section class="section content-section">
            <h1><?php esc_html_e('¡Oops! Error 404', 'stroyka'); ?></h1>
            <h2><?php esc_html_e('Página no encontrada', 'stroyka'); ?></h2>
            <p><?php esc_html_e('No encontramos la página que busca', 'stroyka'); ?></p>
            <p><?php esc_html_e('Intente utilizar la búsqueda', 'stroyka'); ?></p>

            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                <label>
                    <span class="screen-reader-text"><?php echo _x( 'Buscar por:', 'label' ); ?></span>
                    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Buscar consulta...', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Buscar por:', 'label' ); ?>" />
                </label>
                <input type="submit" class="search-submit btn btn-primary" value="<?php echo esc_attr_x( 'Buscar', 'submit button' ); ?>" />
            </form>

            <p><?php esc_html_e('O vaya a inicio para empezar de nuevo', 'stroyka'); ?></p>
            <a class="btn btn-secondary btn-sm" href="<?php echo get_home_url(); ?>">
                <?php echo esc_html('Ir a la página de inicio', 'stroyka'); ?>
            </a>
        </section>
    </header>
</main><!-- .site-main -->

<?php get_footer(); ?>
