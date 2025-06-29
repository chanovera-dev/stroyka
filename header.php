
<?php
/**
 * Header Template
 * 
 * This template outputs the HTML <head> section and includes 
 * all modular header parts: mobile, top, middle, and bottom headers.
 * It ensures proper inclusion only if the corresponding files exist.
 * 
 * @package Stroyka
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php
        $header_parts = [
            'mobile-header',
            'top-header',
            'middle-header',
            'bottom-header',
        ];

        $header_path = get_template_directory() . '/templates/header';

        foreach ( $header_parts as $part ) {
            $file = "$header_path/$part.php";
            if ( file_exists( $file ) ) {
                include_once $file;
            }
        }
    ?>