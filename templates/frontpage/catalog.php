<section class="block">

        <div class="content catalog">
            <?php if ( $mobile_picture = get_field( 'catalog_mobile_picture' ) ) : ?>
                <?php 
                    $url = esc_url( $mobile_picture['url'] );
                    $alt = esc_attr( $mobile_picture['alt'] ?: 'Fotografía de la tienda' );
                    $srcset = wp_get_attachment_image_srcset( $mobile_picture['ID'], 'full' );
                    $sizes = wp_get_attachment_image_sizes( $mobile_picture['ID'], 'full' );
                ?>
                <img class="mobile-picture" src="<?php echo $url; ?>" srcset="<?php echo esc_attr( $srcset ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>" alt="<?php echo $alt; ?>" loading="lazy">
            <?php endif; ?>

            <?php if ( $picture = get_field( 'catalog_picture' ) ) : ?>
                <?php 
                    $url = esc_url( $picture['url'] );
                    $alt = esc_attr( $picture['alt'] ?: 'Fotografía de la tienda' );
                    $srcset = wp_get_attachment_image_srcset( $picture['ID'], 'full' );
                    $sizes = wp_get_attachment_image_sizes( $picture['ID'], 'full' );
                ?>
                <img class="normal-picture" src="<?php echo $url; ?>" srcset="<?php echo esc_attr( $srcset ); ?>" sizes="<?php echo esc_attr( $sizes ); ?>" alt="<?php echo $alt; ?>" loading="lazy">
            <?php endif; ?>
            
            <div class="background-cover"></div>
            
            <div class="content-catalog">
                <?php if ( $title = get_field( 'catalog_title' ) ) : ?>
                    <h2 class="title-section"><?php esc_html_e( $title ); ?></h2>
                <?php endif; ?>

                <?php if ( $text = get_field( 'catalog_text' ) ) : ?>
                    <p class="text"><?php esc_html_e( $text ); ?></p>
                <?php endif; ?>

                <?php if ( $link = get_field( 'catalog_link' ) ) : ?>
                    <?php if ( $label_link = get_field( 'catalog_link_label' ) ) : ?>
                        <a class="catalog-link btn btn-primary btn-sm" href="<?php echo esc_url( $link ); ?>"><?php esc_html_e( $label_link ); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
             </div>
        </div>
</section>