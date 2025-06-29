<section class="block">
    <div class="content">
        <div class="slideshow-wrapper">
            <div class="slideshow hero">
                <?php if ( have_rows( 'hero_repeater' ) ) : ?>
                    <?php $i = 1; ?>
                    <?php while( have_rows( 'hero_repeater' ) ) : the_row(); ?>
                        <div class="slide slide-<?php echo $i; ?>">
                            <?php if ( $mobile_picture = get_sub_field( 'hero_slide_mobile_picture' ) ) : ?>
                                <?php 
                                    $url = esc_url( $mobile_picture['url'] );
                                    $alt = esc_attr( $mobile_picture['alt'] ?: 'Fotografía del producto' );
                                    $srcset = wp_get_attachment_image_srcset( $mobile_picture['ID'], 'full' );
                                    $sizes = wp_get_attachment_image_sizes( $mobile_picture['ID'], 'full' );
                                ?>
                                <img class="mobile-picture" src="<?php echo $url; ?>" srcset="<?php echo esc_attr( $srcset ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>" alt="<?php echo $alt; ?>" loading="lazy">
                            <?php endif; ?>

                            <?php if ( $picture = get_sub_field( 'hero_slide_picture' ) ) : ?>
                                <?php 
                                    $url = esc_url( $picture['url'] );
                                    $alt = esc_attr( $picture['alt'] ?: 'Fotografía del producto' );
                                    $srcset = wp_get_attachment_image_srcset( $picture['ID'], 'full' );
                                    $sizes = wp_get_attachment_image_sizes( $picture['ID'], 'full' );
                                ?>
                                <img class="normal-picture" src="<?php echo $url; ?>" srcset="<?php echo esc_attr( $srcset ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>" alt="<?php echo $alt; ?>" loading="lazy">
                            <?php endif; ?>

                            <div class="background-cover"></div>

                            <div class="slide__content">
                                <?php if ( $title = get_sub_field( 'hero_slide_title' ) ) : ?>  
                                    <h3 class="slide__title"><?php echo str_replace('\n', '<br>', $title ); ?></h3>
                                <?php endif; ?>

                                <?php if ( $text = get_sub_field( 'hero_slide_text' ) ) : ?>
                                    <div class="slide__excerpt"><?php echo str_replace('\n', '<br>', $text ); ?></div>
                                <?php endif; ?>

                                <?php if ( $link = get_sub_field( 'hero_slide_link' ) ) : ?>
                                    <a class="slide__link btn btn-primary btn-lg" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?: '_self' ); ?>">
                                        <?php echo esc_html( $link['title'] ?: 'Comprar ahora' ); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <button class="slideshow-prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
            </button>
            <button class="slideshow-next">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
            </button>
            <ul class="slideshow-dots"></ul>
        </div>
    </div>
</section>