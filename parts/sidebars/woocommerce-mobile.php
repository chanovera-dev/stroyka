<aside class="sidebar-woocommerce--wrapper">
    <div class="name-sidebar--wrapper">
        <p class="name-sidebar"><b><?php echo esc_html__('Filtros', 'stroyka'); ?></b></p>
        <button id="close-sidebar-mobile" onclick="closeSidebarMobile()">
            <svg width="20px" height="20px">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#cross-20"></use>
            </svg>
        </button>
    </div>
    <div id="sidebar-woocommerce--mobile">
        <?php
            if ( is_active_sidebar('woocommerce_sidebar') ) {
                dynamic_sidebar('woocommerce_sidebar');
            }
        ?>
    </div>
</aside>