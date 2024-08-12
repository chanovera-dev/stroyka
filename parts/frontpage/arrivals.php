<div id="arrivals" class="container">
    <section class="title-wrapper buttons-wrapper section">
        <h2 class="title"><?php echo __('Recién llegados', 'pinplast'); ?></h2>
        <div class="slideshow-buttons">
            <button id="backward-button__arrivals" class="products--button" onclick="prevArrivals()" aria-label="button for prev slide">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
            </button>
            <button id="forward-button__arrivals" class="products--button" onclick="nextArrivals()" aria-label="button for next slide">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
        </div>
    </section>
      <section class="arrivals slideshow section">
        <div class="slideshow-products--wrapper">
            <?php echo do_shortcode('[recent_products limit="12"]'); ?>
        </div>
    </section>
</div>