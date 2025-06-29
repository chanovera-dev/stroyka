<section class="block container--posts">
    <div class="content block_header block_header__slideshow">
        <?php if ( $title = get_field( 'blog_title' ) ) : ?>
                <h2 class="block_header__title"><?php esc_html_e( $title ); ?></h2>
            <?php endif; ?>
        <div class="block_header__divider"></div>
        <div class="block_header__buttons">
            <button class="slideshow__button backward-button-b" data-direction="prev" aria-label="Retroceder">
                <svg width="7px" height="11px">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#arrow-rounded-left-7x11"></use>
                </svg>
            </button>
            <button class="slideshow__button forward-button-b" data-direction="next" aria-label="Avanzar">
                <svg width="7px" height="11px">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#arrow-rounded-right-7x11"></use>
                </svg>
            </button>
        </div>
    </div>
    <div class="content">
        <div class="blog">
            <div class="posts">
                <?php
                    global $post;
                    
                    $last_posts = get_posts(array('posts_per_page' => 8));
                    
                    foreach ( $last_posts as $post ) :
                    setup_postdata( $post );

                    get_template_part( 'template-parts/content', 'archive' );

                    endforeach;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>