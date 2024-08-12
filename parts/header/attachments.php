<ul class="attachment-list">
    <?php
        if(is_plugin_active('yith-woocommerce-wishlist/init.php')) {
            echo '<li>'.do_shortcode('[yith_wcwl_items_count]').'</li>';
        } else {
            // echo '<li>'.esc_html__('La wishlist está desactivada').'</li>';
        }
    ?>
    <li>
        <a class="counter cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>">
            <svg width="20px" height="20px">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#cart-20"></use>
            </svg>
            <div class="wrapper">
                <span class="number"><?php echo sprintf (WC()->cart->get_cart_contents_count()); ?></span>
            </div>
        </a>
    </li>
</ul>