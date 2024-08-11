<?php

// M O B I L E
function menuMobile() {
    ?>
        <div class="menu-mobile--wrapper">
            <div class="name-menu--wrapper">
                <p class="name-menu"><b><?php echo esc_html__('Menú', 'stroyka'); ?></b></p>
                <button id="close-menu-mobile" onclick="closeMenuMobile()">
                    <svg width="20px" height="20px">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#cross-20"></use>
                    </svg>
                </button>
            </div>
            <?php
                $menu_id = get_nav_menu_locations()['mobile'];
                $items = wp_get_nav_menu_items($menu_id);
                if (!empty($items)) {
                    wp_nav_menu(
                        array(
                            'container' => 'nav',
                            'container_id' => 'menu-mobile',
                            'container_class' => 'menu-mobile', 
                            'theme_location' => 'mobile',
                        ) 
                    );
                } else {
                    echo '<p>' . esc_html__('El menú mobile está vacío.', 'stroyka') . '</p>';
                }
            ?>
        </div>
    <?php
}