<?php /* Template name: Checkout */
    get_header();
    
    echo '
    <main id="main">
        <div class="container">
            <section class="section">';
                woocommerce_breadcrumb();
                the_title('<h1>', '</h1>');
                echo '
            </section>
        </div>
        <div class="container main-content">
            <section class="section product-cart">';
                echo do_shortcode('[woocommerce_checkout]');
            echo '
            </section>
        </div>
    </main>';

    get_footer();