<?php
$secondary_menu = wp_get_nav_menu_items('secondary');
$tertiary_menu = wp_get_nav_menu_items('tertiary');

if ($secondary_menu || $tertiary_menu) {
    echo '
    <div class="top-bar--wrapper container">
        <section class="section top-bar">';

    if ($secondary_menu) {
        wp_nav_menu(
            array(
                'container' => 'nav', 
                'container_class' => 'secondary', 
                'theme_location' => 'secondary',
            )
        );
    }

    if ($tertiary_menu) {
        wp_nav_menu(
            array(
                'container' => 'nav', 
                'container_class' => 'tertiary', 
                'theme_location' => 'tertiary',
            ) 
        );
    }

        echo '
        </section>
    </div>';
}