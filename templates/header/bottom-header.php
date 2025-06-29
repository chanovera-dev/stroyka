<header class="block">
    <div class="content bottom-header-content">
        <?php if ( class_exists( 'WooCommerce' ) ) : ?>
            
            <div class="categories-list-wrapper">
                <button id="departments-button" class="departments-button">
                    <svg width="18px" height="14px">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#menu-18x14"></use>
                    </svg>
                    <?php echo esc_html_e('Comprar por categoría', 'stroyka'); ?>
                    <svg class="departments__button-arrow" width="9px" height="6px">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#arrow-rounded-down-9x6"></use>
                    </svg>
                </button>
                <?php get_woocommerce_categories(); ?>
            </div>

        <?php endif; ?>

        <?php

            $menu = isset( $locations['primary'] ) ? $locations['primary'] : null;

            if ( $menu ) {
                wp_nav_menu(
                    array(
                        'container' => 'nav', 
                        'container_class' => 'primary', 
                        'theme_location' => 'primary',
                    )
                );
            }

        ?>
        
        <?php
        
            if ( class_exists( 'WooCommerce' ) ) {
                ?>
                <ul class="attachment-list">
                    <?php
                        if(is_plugin_active('yith-woocommerce-wishlist/init.php')) {
                            echo '<li class="wishlist-button">'.do_shortcode('[yith_wcwl_items_count]').'</li>';
                        } else {}
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
            <?php
            }

        ?>
    </div>
</header>