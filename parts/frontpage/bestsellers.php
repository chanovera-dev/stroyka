<div id="bestsellers" class="container">
    <section class="title-wrapper section">
        <h2 class="title"><?php echo esc_html__('Más vendidos', 'pinplast'); ?></h2>
    </section>
    <section class="best-selling section">
        <?php echo do_shortcode('[best_selling_products limit="7"]'); ?>
    </section>
</div>