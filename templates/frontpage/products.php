<div class="block">
    <div class="content">
        <div class="top-rated">
            <div class="block_header">
                <?php if ( $title = get_field( 'top_rated_title' ) ) : ?>
                <h2 class="block_header__title"><?php esc_html_e( $title ); ?></h2>
                <?php endif; ?>
                <div class="block_header__divider"></div>
            </div>
            <?php if ( $shortcode = get_field( 'top_rated_shortcode' ) ) { echo do_shortcode( $shortcode ); } ?>
        </div>
        <?php if ( ! empty( wc_get_product_ids_on_sale() ) ) : ?>
            <div class="sales">
                <div class="block_header">
                    <?php if ( $title = get_field( 'sales_title' ) ) : ?>
                    <h2 class="block_header__title"><?php esc_html_e( $title ); ?></h2>
                    <?php endif; ?>
                    <div class="block_header__divider"></div>
                </div>
                <?php echo do_shortcode( '[sale_products limit="3"]' ); ?>
            </div>
        <?php endif; ?>
        <div class="bestsellers">
            <div class="block_header">
                <?php if ( $title = get_field( 'bestsellers_title' ) ) : ?>
                <h2 class="block_header__title"><?php esc_html_e( $title ); ?></h2>
                <?php endif; ?>
                <div class="block_header__divider"></div>
            </div>
            <?php if ( $shortcode = get_field( 'micro_bestsellers_shortcode' ) ) { echo do_shortcode( $shortcode ); } ?>
        </div>
    </div>
</div>