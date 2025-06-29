<?php

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);    // unhook wrappers
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10); // unhook wrappers

add_action('woocommerce_before_main_content', 'pinplast_wrapper_start', 10);    // hook new wrappers
add_action('woocommerce_sidebar', 'pinplast_wrapper_end', 10);                  // hook new wrappers

function pinplast_wrapper_start() { // before breadcrumbs
    echo '<main id="main"><div class="container"><section class="section">';
}
function pinplast_wrapper_end() { // after original sidebar
    echo '</section></div></main>';
}

function sidebar_container_start() { // add a wrapper for the new sidebar
    echo '<aside class="desktop-woo-sidebar woo-sidebar__body">
            <div class="woo-sidebar__header">
                <h6 class="title-menu">'; esc_html_e( 'Filtros', 'stroyka' ); echo '</h6>
            </div>
            <div class="woo-sidebar__widgets">';
}
add_action('woocommerce_before_main_content', 'sidebar_container_start', 21);

function sidebar_container_end() { // close the wrapper for the new sidebar
    echo '</div></aside>';
}
add_action('woocommerce_before_main_content', 'sidebar_container_end', 23);

function sidebar_buttons() { // sidebar buttons
echo '
    <button id="filters-button" onclick="openWooCommerceSidebar()">
    <svg width="16px" height="16px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
        <g id="Layer_2" data-name="Layer 2">
            <g id="invisible_box" data-name="invisible box">
            <rect width="48" height="48" fill="none" color=""currentColor/>
            </g>
            <g id="icons_Q2" data-name="icons Q2">
            <path d="M41.8,8H21.7A6.2,6.2,0,0,0,16,4a6,6,0,0,0-5.6,4H6.2A2.1,2.1,0,0,0,4,10a2.1,2.1,0,0,0,2.2,2h4.2A6,6,0,0,0,16,16a6.2,6.2,0,0,0,5.7-4H41.8A2.1,2.1,0,0,0,44,10,2.1,2.1,0,0,0,41.8,8ZM16,12a2,2,0,1,1,2-2A2,2,0,0,1,16,12Z"/>
            <path d="M41.8,22H37.7A6.2,6.2,0,0,0,32,18a6,6,0,0,0-5.6,4H6.2a2,2,0,1,0,0,4H26.4A6,6,0,0,0,32,30a6.2,6.2,0,0,0,5.7-4h4.1a2,2,0,1,0,0-4ZM32,26a2,2,0,1,1,2-2A2,2,0,0,1,32,26Z"/>
            <path d="M41.8,36H24.7A6.2,6.2,0,0,0,19,32a6,6,0,0,0-5.6,4H6.2a2,2,0,1,0,0,4h7.2A6,6,0,0,0,19,44a6.2,6.2,0,0,0,5.7-4H41.8a2,2,0,1,0,0-4ZM19,40a2,2,0,1,1,2-2A2,2,0,0,1,19,40Z"/>
            </g>
        </g>
    </svg>' . 
        esc_html__('Filtros', 'pinplast') . '
    </button>';
}
add_action('woocommerce_before_main_content', 'sidebar_buttons', 24);