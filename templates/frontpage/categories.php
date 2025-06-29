<section class="block">
    <div class="content block_header">
        <?php if ( $title = get_field( 'categories_title' ) ) : ?>
            <h2 class="block_header__title"><?php esc_html_e( $title ); ?></h2>
        <?php endif; ?>
        <div class="block_header__divider"></div>
    </div>
    <div class="content content-categories">
        <?php mostrar_categorias_mas_vendidas(); ?>
    </div>
</section>