<div class="content site-footer-bottom">
    <div class="payments">
        <?php
            $icons = ['visa', 'mastercard'];

            foreach ($icons as $icon) {
                $path = get_template_directory() . "/assets/icons/{$icon}.svg";
                if (file_exists($path)) {
                    echo file_get_contents($path);
                }
            }
        ?>
    </div>
    <p>
        &copy; <?php bloginfo( 'name' ); ?> <?php echo date('Y'); ?> • 
        <?php esc_html_e( 'Todos los Derechos Reservados', 'stories' ); ?>
    </p>
</div>
