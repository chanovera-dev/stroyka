<?php

$locations = get_nav_menu_locations();
$menu = $locations['top'] ?? null;

if ( $menu ) :
?>
    <header class="block">
        <section class="content top-header-content" style="opacity:0;">
            <?php
            wp_nav_menu([
                'container'       => 'nav',
                'container_class' => 'top-header',
                'theme_location'  => 'top',
            ]);
            ?>
        </section>
    </header>
<?php endif; ?>