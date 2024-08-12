<?php
// Obtener productos destacados
$args = array(
    'featured' => true,
);
$productos_destacados = wc_get_products( $args );

// Verificar si no hay productos
if (empty($productos_destacados)) {
    echo '
    <div class="container">
        <section class="section padding-section">
            <p>'.esc_html__('No hay productos destacados en este momento. ¡Vuelve pronto!', 'pinplast').'</p>
        </section>
    </div>';
} else { ?>
    <div id="featured-products" class="container">
        <div class="title-wrapper buttons-wrapper section">
            <h2 class="title"><?php echo esc_html__('Productos destacados', 'pinplast'); ?></h2>
            <div class="slideshow-buttons">
                <button id="backward-button__featured-products" class="products--button" onclick="prevFP()" aria-label="button for prev slide">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </button>
                <button id="forward-button__featured-products" class="products--button" onclick="nextFP()" aria-label="button for next slide">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
        </div>
        <section class="featured-products slideshow section">
            <div class="slideshow-products--wrapper">
                <?php echo do_shortcode('[featured_products limit="8"]'); ?>
            </div>
        </section>
    </div>
<?php } ?>