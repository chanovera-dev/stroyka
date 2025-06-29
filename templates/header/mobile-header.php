<?php $sprite_path = esc_url(get_template_directory_uri()) . '/assets/img/sprite.svg'; ?>

<div id="menu-mobile__backdrop" class="menu-mobile__backdrop"></div>

<?php
    $files = [
        'menu-mobile' => true,
        'mobile-woo-sidebar' => ( class_exists('WooCommerce') && is_shop() ),
        'header' => true
    ];

    foreach ( $files as $file => $condition ) {
        if ( $condition ) {
            $path = get_template_directory() . "/templates/header/mobile/$file.php";
            if ( file_exists( $path ) ) {
                include_once $path;
            }
        }
    }
?>