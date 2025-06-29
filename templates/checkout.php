<?php 
/**
 * Template Name: Checkout
 */
get_header(); ?>

<main id="main" class="site-main" role="main">
    <header class="block">
        <div class="content">
            <?php
                woocommerce_breadcrumb();
                the_title( '<h1 class="main-title">', '</h1>' );
            ?>
        </div>
    </header>
    <div class="block">
        <div class="content">
            <?php echo do_shortcode( '[woocommerce_checkout]' ); ?>
        </div>
    </div>
</main><!-- .site-main -->

<?php get_footer(); ?>