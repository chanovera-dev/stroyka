<?php
/**
 * Stroyka Theme Engine Loader
 *
 * Loads and initializes all core components required by the Stroyka theme,
 * including widgets, template helpers, customizer options, and WooCommerce integration.
 *
 * @package Stroyka
 * @since 1.0.0
 */

// Get theme version
$theme = wp_get_theme( 'stroyka' );
$stroyka_version = $theme instanceof WP_Theme ? $theme->get( 'Version' ) : '1.0.0';

// Define base include path
$inc_dir = get_template_directory() . '/inc';

// Initialize theme object
$stroyka = (object) [
    'version' => $stroyka_version,
];

// Core files to include
$core_files = [
    'core'           => $inc_dir . '/core.php',
    'extended'       => $inc_dir . '/extended.php',
    'custom-widgets' => $inc_dir . '/custom-widgets.php',
    'templates'      => $inc_dir . '/templates.php',
    'customizer'     => $inc_dir . '/customizer.php',
];

// Include each file if it exists
foreach ( $core_files as $key => $file_path ) {
    if ( file_exists( $file_path ) ) {
        $stroyka->{$key} = require_once $file_path;
    } else {
        error_log( "Missing required file: $file_path" );
    }
}

// WooCommerce support
if ( class_exists( 'WooCommerce' ) ) {
    $woocommerce_file = get_template_directory() . '/functions/woocommerce.php';
    if ( file_exists( $woocommerce_file ) ) {
        require_once $woocommerce_file;
    } else {
        error_log( 'WooCommerce integration file not found.' );
    }
}