<div class="content site-footer-top">
    <?php
        $menus = ['contact', 'information', 'most-viewed'];
        $locations = get_nav_menu_locations();

        foreach ( $menus as $location ) {
            $menu_id = $locations[$location] ?? null;

            if ( $menu_id ) {
                $menu = wp_get_nav_menu_object( $menu_id );
                $items = wp_get_nav_menu_items( $menu_id );

                if ( ! empty( $items ) ) {
                    $extra_class = ( $location === 'contact' ) ? ' footer-contacts' : '';
                    echo '<div class="footer-links' . esc_attr( $extra_class ) . '">';
                    echo '<h2 class="footer-links__title">' . esc_html( $menu->name ) . '</h2>';
                    wp_nav_menu([
                        'container'      => 'nav',
                        'container_id'   => esc_attr( $location ),
                        'theme_location' => $location,
                    ]);
                    echo '</div>';
                }
            }
        }

        if ( ! function_exists( 'is_plugin_active' ) ) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        $social_menu_id = $locations['social'] ?? null;
        $social_menu = wp_get_nav_menu_object( $social_menu_id );
        $social_items = wp_get_nav_menu_items( $social_menu_id );

        if ( is_plugin_active( 'newsletter/plugin.php' ) || ! empty( $social_items ) ) {
            echo '<div class="newsletter social--wrapper">';

            if ( is_plugin_active( 'newsletter/plugin.php' ) ) {
                echo '<h2 class="title-section">';
                esc_html_e( 'Newsletter', 'stroyka' );
                echo '</h2><p>';
                esc_html_e( 'Suscríbete a nuestros envíos de correo y recibe promociones y ofertas exclusivas.', 'stroyka' );
                echo '</p>' . do_shortcode( '[newsletter_form]' );
            }

            if ( ! empty( $social_items ) ) {
                echo '<p class="title-social">' . esc_html( $social_menu->name ) . '</p>';
                wp_nav_menu([
                    'container'       => 'nav',
                    'container_class' => 'social',
                    'theme_location'  => 'social',
                ]);
            }

            echo '</div>';
        }
    ?>
</div>