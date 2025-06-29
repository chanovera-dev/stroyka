<section class="block">
    <div class="content block_header block_header__slideshow">
        <?php if ( $title = get_field( 'arrivals_title' ) ) : ?>
                <h2 class="block_header__title"><?php esc_html_e( $title ); ?></h2>
            <?php endif; ?>
        <div class="block_header__divider"></div>
        <div class="block_header__buttons">
            <button class="slideshow__button backward-button-a" data-direction="prev" aria-label="Retroceder">
                <svg width="7px" height="11px">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#arrow-rounded-left-7x11"></use>
                </svg>
            </button>
            <button class="slideshow__button forward-button-a" data-direction="next" aria-label="Avanzar">
                <svg width="7px" height="11px">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#arrow-rounded-right-7x11"></use>
                </svg>
            </button>
        </div>
    </div>
    <div class="content arrivals slideshow-products--wrapper">
        <?php if ( $shortcode = get_field( 'arrivals_shortcode' ) ) { echo do_shortcode( $shortcode ); } ?>
    </div>
</section>