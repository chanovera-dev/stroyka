<?php
    get_header();

    echo '
    <main id="main">';
        include(TEMPLATEPATH . '/parts/frontpage/hero.php');
        include(TEMPLATEPATH . '/parts/frontpage/features.php');
        include(TEMPLATEPATH . '/parts/frontpage/featured-products.php');
        include(TEMPLATEPATH . '/parts/frontpage/catalog.php');
        include(TEMPLATEPATH . '/parts/frontpage/bestsellers.php');
        // // include(TEMPLATEPATH . '/parts/frontpage/categories.php');
        include(TEMPLATEPATH . '/parts/frontpage/arrivals.php');
        $ofertas = wc_get_product_ids_on_sale(); if (empty($ofertas)) : else : include(TEMPLATEPATH . '/parts/frontpage/sale-products.php'); endif;
        if ( get_posts() == null ) : else: include(TEMPLATEPATH . '/parts/frontpage/blog.php'); endif;
        include(TEMPLATEPATH . '/parts/frontpage/products.php');

        echo '
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.086427045604!2d-96.11546012612297!3d19.147693749720545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c34102c93cc915%3A0x9f9b43f17b9f4a61!2sPin%20Plast!5e0!3m2!1ses-419!2smx!4v1708618960659!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </main>';

get_footer();