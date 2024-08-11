<?php

// carga componentes (estilos, javascript, etc) en el header
function load_parts_header() {
    // quita el soporte para el tema de bloques
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'load_parts_header' );

// Carga componentes (estilos, javascript, etc) en el footer
function load_parts_footer(){
    // JS que permite llamar iconos embebidos
    wp_enqueue_script('svg4everybody', get_template_directory_uri() . '/assets/js/svg4everybody.min.js', array(), '1.0', true);
    // Scripts globales para todo el sitio
    wp_enqueue_script('generals', get_template_directory_uri() . '/assets/js/global.js', array(), '1.0', true);
}
add_action( 'get_footer', 'load_parts_footer' );

// Registro de menús
register_nav_menus( 
    array(
        'mobile' => __( 'Mobile', 'stroyka' ),
        'primary' => __( 'Primary', 'stroyka' ),
        'secondary' => __( 'Secondary', 'stroyka' ),
        'tertiary' => __( 'Tertiary', 'stroyka' ),
        'information' => __( 'Information', 'stroyka' ),
        'most-viewed' => __( 'Most viewed', 'stroyka' ),
        'social' => __( 'Social', 'stroyka' ), 
    ) 
);

function stroyka_theme_support(){ 
    
    add_theme_support( 'title-tag' );
    
    add_theme_support( 'automatic-feed-links' );
    
    add_theme_support( 'custom-logo', array( 
    'height' => 240,
    'width' => 240, 
    'flex-height' => true,
    ) );

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    
    add_theme_support( 'post-formats', array(
        'aside',
        'image', 
        'video',
        'quote',
        'link',
        'gallery',
        'status',
        'audio',
        'chat',
    ) );
    
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add it for posts
	set_post_thumbnail_size( 200, 200, true ); // Normal post thumbnails, hard crop mode
	add_image_size( 'post-image', 600, 200, true ); // Post thumbnails, hard crop mode
	add_image_size( 'slider-image', 920, 300, true ); // Post thumbnails for slider, hard crop mode

	add_theme_support('custom-background');

} 
add_action('after_setup_theme', 'stroyka_theme_support');

// permite subir svg a wordpress
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Delimita el tamaño del excerpt a 25 palabras
function limite_excerpt($limite) { return 20; }
add_filter ('excerpt_length', 'limite_excerpt', 999);

// registra las sidebars
function widgets_areas(){

    register_sidebar(
        array(
            'name' => __('Blog Sidebar','stroyka'),
            'id' => 'blog-sidebar',
            'description' => __('Sidebar Widget Area','stroyka'),
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            'before_widget' => '',
            'after_widget' => '',
        )
    );
}
add_action( 'widgets_init', 'widgets_areas' );

// A N E X O S
/* anexo para cargar el css que se usa en todas las páginas */
require_once(get_template_directory() . '/functions/global.php');
// establecer los breakpoints
require_once(get_template_directory() . '/functions/breakpoints.php');
// partes del tema
require_once(get_template_directory() . '/functions/parts.php');
// Anexo para establecer iconos
// require_once(get_template_directory() . '/functions/icons.php');
// Anexo para definir los componentes personalizados en las plantillas
// require_once(get_template_directory() . '/functions/templates.php');
// Anexo para definir los backgrounds en las plantillas
// require_once(get_template_directory() . '/functions/backgrounds.php');
// Anexo para definir los el customizer de wordpress
// require_once(get_template_directory() . '/functions/customizer.php');
// anexo para activar woocommerce
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    require_once(get_template_directory() . '/functions/woocommerce.php');
} else {}