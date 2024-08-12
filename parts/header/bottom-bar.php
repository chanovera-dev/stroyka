<section class="section bottom-bar">
    <div class="categories-list-wrapper">
        <button id="departments-button" class="departments-button">
            <svg width="18px" height="14px">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#menu-18x14"></use>
            </svg>
            <?php echo esc_html__('Categorías', 'pinplast'); ?>
            <svg class="departments__button-arrow" width="9px" height="6px">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#arrow-rounded-down-9x6"></use>
            </svg>
        </button>
        <?php obtener_categorias_woocommerce(); ?>
    </div>
    <?php
        $menu_id = get_nav_menu_locations()['primary'];
        $items = wp_get_nav_menu_items($menu_id);

        if (!empty($items)) {
            wp_nav_menu(
                array(
                    'container' => 'nav',
                    'container_class' => 'primary',
                    'theme_location' => 'primary',
                )
            );
        }
        include(TEMPLATEPATH . '/parts/header/attachments.php');
    ?>
</section>