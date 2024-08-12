<?php
echo '
<div class="middle-bar-wrapper container">
    <section class="section middle-bar">';
    include(TEMPLATEPATH . '/parts/header/brand.php');
    get_search_form();
    echo '
        <div id="customer-service-phone">';
            echo '
            <p>'.esc_html__('Servicio al cliente', 'stroyka').'</p>';
            echo '
            <a href="tel:'. get_theme_mod('phone_number', '2299216844') . '"><p><span class="customer-service">' . get_theme_mod('phone_number', '2299216844') . '</span></p></a>';
        echo '
        </div>
    </section>
</div>';