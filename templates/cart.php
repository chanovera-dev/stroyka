<?php 
/**
 * Template Name: Carrito
 */
get_header(); ?>

<main id="main" class="site-main" role="main">
    <header class="block">
        <div class="content">
            <?php
                woocommerce_breadcrumb();
                the_title('<h1>', '</h1>');
            ?>
        </div>
    </header>
    <div class="block">
        <div class="content">
            <?php echo do_shortcode('[woocommerce_cart]'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>