<?php 
/**
 * Frontpage
 * Template for the site's homepage.
 * Loads sections conditionally from /templates/frontpage.
 * 
 * @package stroyka
 * @since 1.0.0
 */
get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php
        $directory = get_template_directory() . '/templates/frontpage';
        $featured_products = wc_get_products( array( 'featured' => true ) );

        $sections = [
            'hero' => have_rows( 'hero_repeater' ),
            'features' => have_rows( 'block_features_repeater' ),
            'featured-products' => ! empty( $featured_products ),
            'catalog',
            'bestsellers',
            'categories',
            'arrivals',
            // 'sales' => ! empty( wc_get_product_ids_on_sale() ),
            'blog' => ! empty( get_posts() ),
            'brands',
            'products',
        ];

        foreach ( $sections as $section => $condition ) {
            if ( is_int( $section ) ) {
                $section   = $condition;
                $condition = true;
            }

            if ( $condition && file_exists( "$directory/$section.php" ) ) {
                include "$directory/$section.php";
            }
        }

        the_content();
    ?>
</main><!-- .site-main -->

<?php get_footer(); ?>