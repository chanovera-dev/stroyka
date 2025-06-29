<header class="block mobile-header">
    <section class="content mobile-header-content">
        <button 
            type="button" 
            id="open-menu-mobile-button" 
            class="open-menu-mobile--button" 
            onclick="openMenuMobile()" 
            aria-label="Abrir menú móvil" 
            aria-controls="mobilemenu__body" 
            aria-expanded="false"
        >
            <svg width="18px" height="14px" color="currentColor" role="img" aria-hidden="true">
                <use href="<?= $sprite_path ?>#menu-18x14"></use>
            </svg>
        </button>

        <div class="site-brand">
            <?php if ( ! has_custom_logo() ) : ?>
                <a href="<?= get_home_url(); ?>" aria-label="Ir a la página de inicio">
                    <svg xmlns="http://www.w3.org/2000/svg" width="120px" height="20px" color="currentColor">
                        <path d="M118.5,20h-1.1c-0.6,0-1.2-0.4-1.4-1l-1.5-4h-6.1l-1.5,4c-0.2,0.6-0.8,1-1.4,1h-1.1c-1,0-1.8-1-1.4-2l1.1-3
                                l1.5-4l3.6-10c0.2-0.6,0.8-1,1.4-1h1.6c0.6,0,1.2,0.4,1.4,1l3.6,10l1.5,4l1.1,3C120.3,19,119.5,20,118.5,20z M111.5,6.6l-1.6,4.4
                                h3.2L111.5,6.6z M99.5,20h-1.4c-0.4,0-0.7-0.2-0.9-0.5L94,14l-2,3.5v1c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-17
                                C88,0.7,88.7,0,89.5,0h1C91.3,0,92,0.7,92,1.5v8L94,6l3.2-5.5C97.4,0.2,97.7,0,98.1,0h1.4c1.2,0,1.9,1.3,1.3,2.3L96.3,10l4.5,7.8
                                C101.4,18.8,100.7,20,99.5,20z M80.3,11.8L80,12.3v6.2c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-6.2l-0.3-0.5l-5.5-9.5
                                c-0.6-1,0.2-2.3,1.3-2.3h1.4c0.4,0,0.7,0.2,0.9,0.5L76,4.3l2,3.5l2-3.5l2.2-3.8C82.4,0.2,82.7,0,83.1,0h1.4c1.2,0,1.9,1.3,1.3,2.3
                                L80.3,11.8z M60,20c-5.5,0-10-4.5-10-10S54.5,0,60,0s10,4.5,10,10S65.5,20,60,20z M60,4c-3.3,0-6,2.7-6,6s2.7,6,6,6s6-2.7,6-6
                                S63.3,4,60,4z M47.8,17.8c0.6,1-0.2,2.3-1.3,2.3h-2L41,14h-4v4.5c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-17
                                C33,0.7,33.7,0,34.5,0H41c0.3,0,0.7,0,1,0.1c3.4,0.5,6,3.4,6,6.9c0,2.4-1.2,4.5-3.1,5.8L47.8,17.8z M42,4.2C41.7,4.1,41.3,4,41,4h-3
                                c-0.6,0-1,0.4-1,1v4c0,0.6,0.4,1,1,1h3c0.3,0,0.7-0.1,1-0.2c0.3-0.1,0.6-0.3,0.9-0.5C43.6,8.8,44,7.9,44,7C44,5.7,43.2,4.6,42,4.2z
                                M29.5,4H25v14.5c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5V4h-4.5C15.7,4,15,3.3,15,2.5v-1C15,0.7,15.7,0,16.5,0h13
                                C30.3,0,31,0.7,31,1.5v1C31,3.3,30.3,4,29.5,4z M6.5,20c-2.8,0-5.5-1.7-6.4-4c-0.4-1,0.3-2,1.3-2h1c0.5,0,0.9,0.3,1.2,0.7
                                c0.2,0.3,0.4,0.6,0.8,0.8C4.9,15.8,5.8,16,6.5,16c1.5,0,2.8-0.9,2.8-2c0-0.7-0.5-1.3-1.2-1.6C7.4,12,7,11,7.4,10.3l0.4-0.9
                                c0.4-0.7,1.2-1,1.8-0.6c0.6,0.3,1.2,0.7,1.6,1.2c1,1.1,1.7,2.5,1.7,4C13,17.3,10.1,20,6.5,20z M11.6,6h-1c-0.5,0-0.9-0.3-1.2-0.7
                                C9.2,4.9,8.9,4.7,8.6,4.5C8.1,4.2,7.2,4,6.5,4C5,4,3.7,4.9,3.7,6c0,0.7,0.5,1.3,1.2,1.6C5.6,8,6,9,5.6,9.7l-0.4,0.9
                                c-0.4,0.7-1.2,1-1.8,0.6c-0.6-0.3-1.2-0.7-1.6-1.2C0.6,8.9,0,7.5,0,6c0-3.3,2.9-6,6.5-6c2.8,0,5.5,1.7,6.4,4C13.3,4.9,12.6,6,11.6,6
                                z">
                        </path>
                    </svg>
                </a>
            <?php 
            else:
                the_custom_logo();
            endif;
            ?>
        </div>

        <?php if (class_exists('WooCommerce')) : ?>
            <div class="woocommerce-search--wrapper">
                <div class="widget woocommerce widget_product_search">
                    <?php $index = rand(); ?>
                    <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
                        <label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo esc_attr($index); ?>">
                            <?php esc_html_e('Buscar por:', 'woocommerce'); ?>
                        </label>
                        <input type="search" id="woocommerce-product-search-field-<?php echo esc_attr($index); ?>" class="search-field" placeholder="<?php echo esc_attr__('Buscar productos…', 'woocommerce'); ?>" value="<?php echo get_search_query(); ?>" name="s">
                        <button type="submit" value="Buscar" class="search-button" aria-label="Buscar">
                            <svg width="20px" height="20px" color="currentColor" role="img" aria-hidden="true">
                                <use href="<?= $sprite_path ?>#search-20"></use>
                            </svg>
                        </button>
                        <input type="hidden" name="post_type" value="product">
                    </form>
                </div>

                <button 
                    type="button" 
                    id="close-search-mobile__button" 
                    onclick="closeWooCommerceSearchform()" 
                    aria-label="Cerrar búsqueda"
                    aria-controls="woocommerce-product-search-field-<?php echo esc_attr($index); ?>"
                >
                    <svg width="20px" height="20px" color="currentColor" role="img" aria-hidden="true">
                        <use href="<?= $sprite_path ?>#cross-20"></use>
                    </svg>
                </button>
            </div>

            <button 
                type="button" 
                id="open-search-mobile__button" 
                onclick="openWooCommerceSearchform()" 
                aria-label="Abrir búsqueda de productos" 
                aria-controls="woocommerce-product-search-field-<?php echo esc_attr($index); ?>"
                aria-expanded="false"
            >
                <svg width="20px" height="20px" color="currentColor" role="img" aria-hidden="true">
                    <use href="<?= $sprite_path ?>#search-20"></use>
                </svg>
            </button>

            <ul class="attachment-list">
                <?php
                if (is_plugin_active('yith-woocommerce-wishlist/init.php')) {
                    echo '<li class="wishlist-button">' . do_shortcode('[yith_wcwl_items_count]') . '</li>';
                }
                ?>
                <li>
                    <a class="counter cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" aria-label="Ver carrito">
                        <svg width="20px" height="20px" role="img" aria-hidden="true">
                            <use href="<?= $sprite_path ?>#cart-20"></use>
                        </svg>
                        <div class="wrapper">
                            <span class="number"><?php echo sprintf(WC()->cart->get_cart_contents_count()); ?></span>
                        </div>
                    </a>
                </li>
            </ul>
        <?php endif; ?>
    </section>
</header>