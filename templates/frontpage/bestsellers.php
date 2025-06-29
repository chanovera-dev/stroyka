<section class="block">
    <div class="content block_header">
        <?php if ( $title = get_field( 'bestsellers_title' ) ) : ?>
            <h2 class="block_header__title"><?php esc_html_e( $title ); ?></h2>
        <?php endif; ?>
        <div class="block_header__divider"></div>
    </div>
    <div class="content content-bestsellers">
        <?php if ( $shortcode = get_field( 'bestsellers_shortcode' ) ) { echo do_shortcode( $shortcode ); } ?>
    </div>
</section>