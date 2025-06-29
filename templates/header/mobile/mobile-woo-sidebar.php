<div class="mobile-woo-sidebar woo-sidebar__body" role="dialog" aria-modal="true" aria-labelledby="woo-sidebar-title">
    <div class="woo-sidebar__header">
        <h2 id="woo-sidebar-title" class="title-menu"><?php esc_html_e('Filtros', 'stroyka'); ?></h2>
        <button 
            type="button" 
            id="close-woo-sidebar-button" 
            class="close-menu-mobile--button" 
            onclick="closeWooCommerceSidebar()"
            aria-label="Cerrar filtros de WooCommerce"
            aria-controls="woo-sidebar__body"
            aria-expanded="true"
        >
            <svg width="20px" height="20px" color="currentColor" role="img" aria-hidden="true">
                <use href="<?= $sprite_path ?>#cross-20"></use>
            </svg>
        </button>
    </div>
    <div class="woo-sidebar__widgets">
        <?php 
            if (is_active_sidebar('woocommerce_sidebar')) {
                dynamic_sidebar('woocommerce_sidebar');
            } 
        ?>
    </div>    
</div>