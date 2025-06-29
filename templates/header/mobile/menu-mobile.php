<div class="menu-mobile menu-mobile__body" role="dialog" aria-modal="true" aria-labelledby="mobile-menu-title" id="menu-mobile__body">
    <?php
    $locations = get_nav_menu_locations();
    $menu_id   = $locations['mobile'] ?? null;

    if ($menu_id && ($items = wp_get_nav_menu_items($menu_id))) {
        $menu = wp_get_nav_menu_object($menu_id);
        ?>
        <div class="menu-mobile__header">
            <h4 id="mobile-menu-title" class="title-menu"><?= esc_html($menu->name) ?></h4>
            <button 
                type="button" 
                id="close-menu-mobile-button" 
                class="close-menu-mobile--button" 
                onclick="closeMenuMobile()" 
                aria-label="Cerrar menú móvil" 
                aria-controls="menu-mobile__body"
                aria-expanded="true"
            >
                <svg width="20px" height="20px" color="currentColor" role="img" aria-hidden="true">
                    <use href="<?= $sprite_path ?>#cross-20"></use>
                </svg>
            </button>
        </div>
        <?php
            wp_nav_menu([
                'container'       => 'nav',
                'container_class' => 'menu-mobile--wrapper',
                'container_id'    => 'menu-mobile--wrapper',
                'theme_location'  => 'mobile',
                'menu_id'         => 'mobile--list',
                'menu_class'      => 'mobile--list',
                'items_wrap'      => '<ul id="%1$s" class="%2$s" role="menu">%3$s</ul>'
            ]);
    } else {
        echo '<p>' . esc_html__('Aún no se ha asignado un menú en esta locación', 'stroyka') . '</p>';
    }
    ?>
</div>