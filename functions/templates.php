<?php

// Estilos para la página frontal
function pinplast_frontpage_styles() {
    if ( is_front_page() or is_page_template('front-page.php') ) {
        wp_dequeue_style( 'wp-block-library' );
        /* sections */
        wp_enqueue_style( 'frontpage-styles', get_template_directory_uri() . '/assets/css/frontpage/frontpage.css' );
        
        /* styles hero section */
        wp_enqueue_style( 'hero-styles', get_template_directory_uri() . '/assets/css/frontpage/hero.css' );
        /* slideshow hero section */
        wp_enqueue_script( 'slideshow-hero', get_template_directory_uri() . '/assets/js/slideshow-hero.js', array(), '1.0', true );
        /* features */
        wp_enqueue_style( 'features-styles', get_template_directory_uri() . '/assets/css/frontpage/features.css' );
        
        /* listas de productos */
        wp_enqueue_style( 'lists-styles', get_template_directory_uri() . '/assets/css/woocommerce/lists.css' );
        
        /* slideshow de productos */
        wp_enqueue_style( 'slideshow-styles', get_template_directory_uri() . '/assets/css/frontpage/slideshows.css' );
        // observers
        wp_enqueue_script( 'observers', get_template_directory_uri() . '/assets/js/observers.js', array(), '1.0', true );
        
        
        /* catalog link */
        wp_enqueue_style( 'catalog-styles', get_template_directory_uri() . '/assets/css/frontpage/catalog.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'pinplast_frontpage_styles' );

// componentes para las páginas de tipo 'page'
function page_styles() {
    if ( is_page() ) {
        wp_enqueue_style( 'page-styles', get_template_directory_uri() . '/assets/css/page.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'page_styles' );

// Estilos para la página 404
function page404_styles() {
    if ( is_404() ) {
        wp_enqueue_style( 'error404-styles', get_template_directory_uri() . '/assets/css/error404.css' );
        /* forms */
        wp_enqueue_style( 'forms-styles', get_template_directory_uri() . '/assets/css/forms.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'page404_styles' );

// Estilos para la página archivo
function archive_styles() {
    if ( is_home() or is_page_template('home.php') or is_archive() ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_enqueue_style( 'blog-styles', get_template_directory_uri() . '/assets/css/blog.css' );
        wp_enqueue_style( 'pagination-styles', get_template_directory_uri() . '/assets/css/pagination.css' );
        wp_enqueue_style( 'widgets-styles', get_template_directory_uri() . '/assets/css/widgets.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'archive_styles' );

// Estilos para el template de la página Contacto
function contact_styles() {
    if ( is_page_template('contact.php') ) {
        wp_enqueue_style( 'contact-styles', get_template_directory_uri() . '/assets/css/contact.css' );
        /* forms */
        wp_enqueue_style( 'forms-styles', get_template_directory_uri() . '/assets/css/forms.css' );
        // habilita contact form 7 en esta plantilla
        if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
            wpcf7_enqueue_scripts();
          }
        if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
            wpcf7_enqueue_styles();
        }
    }
}
add_action( 'wp_enqueue_scripts', 'contact_styles' );

// Estilos para la página archivo
function search_styles() {
    if ( is_search() ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_enqueue_style( 'search-styles', get_template_directory_uri() . '/assets/css/search.css' );
        wp_enqueue_style( 'lists-styles', get_template_directory_uri() . '/assets/css/woocommerce/lists.css' );
        wp_enqueue_style( 'pagination-styles', get_template_directory_uri() . '/assets/css/pagination.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'search_styles' );

// Estilos para todos los artículos
function single_styles() {
    if ( is_single() ) {
        wp_enqueue_style( 'single-styles', get_template_directory_uri() . '/assets/css/single.css' );
        wp_enqueue_style( 'widgets-styles', get_template_directory_uri() . '/assets/css/widgets.css' );
        /* forms */
        wp_enqueue_style( 'forms-styles', get_template_directory_uri() . '/assets/css/forms.css' );

    }
}
add_action( 'wp_enqueue_scripts', 'single_styles' );