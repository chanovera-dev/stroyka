<footer id="main-footer">
                <div class="container footer-widgets--wrapper">
                    <section class="section footer-widgets">
                        <div class="contact">
                            <h2><?php echo esc_html__('Contacto', 'stroyka'); ?></h2>
                            <?php include(TEMPLATEPATH.'/parts/widgets/address.php'); ?>
                        </div>
                        <?php
                            $menu_id_information = get_nav_menu_locations()[ 'information' ];
                            $menu_id_mv = get_nav_menu_locations()[ 'most-viewed' ];
                            $menu_information = wp_get_nav_menu_object( $menu_id_information );
                            $menu_mv = wp_get_nav_menu_object( $menu_id_mv );
                            $items_information = wp_get_nav_menu_items( $menu_id_information );
                            $items_mv = wp_get_nav_menu_items( $menu_id_mv );
                            if (!empty($items_information) || !empty($items_mv)) {
                                echo '<div class="menus">';
                                    if (!empty($items_information)) {
                                        echo '
                                        <div><h2>' . $menu_information->name . '</h2>';
                                        wp_nav_menu(
                                            array(
                                                'container' => 'nav', 
                                                'container_class' => 'information', 
                                                'theme_location' => 'information',
                                            ) 
                                        );
                                        echo '</div>';
                                    }
                                    if (!empty($items_mv)) {
                                        echo '
                                        <div><h2>' . $menu_mv->name . '</h2>';
                                        wp_nav_menu(
                                            array(
                                                'container' => 'nav', 
                                                'container_class' => 'most-viewed', 
                                                'theme_location' => 'most-viewed',
                                            ) 
                                        );
                                        echo '</div>';
                                    }
                                echo '</div>';
                            } 
                            $menu_id_social = get_nav_menu_locations()['social'];
                            $menu_social = wp_get_nav_menu_object($menu_id_social);
                            $items_social = wp_get_nav_menu_items($menu_id_social);
                            if(is_plugin_active('newsletter/plugin.php') || !empty($items_social)) {
                                echo '<div class="newsletter">';
                                if(is_plugin_active('newsletter/plugin.php')) {
                                    echo '
                                    <h2>' . esc_html__('Boletín de noticias', 'stroyka') . '</h2>
                                    <p>'.esc_html__('Suscríbete a nuestros envíos de correo y recibe promociones y ofertas exclusivas.', 'stroyka').'</p>'.
                                    do_shortcode('[newsletter_form]');
                                }
                                if (!empty($items_social)) {
                                    echo '
                                    <div>
                                        <p class="title">' . $menu_social->name . '</p>';
                                    wp_nav_menu(
                                        array(
                                            'container' => 'nav',
                                            'container_class' => 'social',
                                            'theme_location' => 'social',
                                        )
                                    );
                                    echo '
                                    </div>';
                                }
                                echo '</div>';
                            }
                            
                        ?>
                    </section>
                </div>
                <div class="container">
                    <section class="section copyright">
                        <div class="payments"><img src="<?php echo get_theme_mod('payments', get_bloginfo('template_url') . '/assets/img/payments.png'); ?>" alt="métodos de pago" loading="lazy"></div>
                        <p>© <?php bloginfo('title'); echo ' '.date("Y").' · '.esc_html__('Todos los derechos reservados', 'stroyka'); ?></p>
                    </section>
                </div>
            </footer>
            <?php wp_footer(); ?>
        </div>
    </body>
</html>