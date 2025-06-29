<section class="block">
    <div class="content content-features">
        <?php if ( have_rows( 'block_features_repeater' ) ) : ?>
            <?php while( have_rows( 'block_features_repeater' ) ) : the_row(); ?>
                <div class="block-feature">
                    <?php if ( $link = get_sub_field( 'block_feature_link' ) ) : ?>
                        <a class="block-feature-link" href="<?php echo esc_url( $link ); ?>">
                            <?php
                                $svg_id = get_sub_field( 'block_feature_icon' );
                                if ( $svg_id ) {
                                    $svg_path = get_attached_file( $svg_id );

                                    if ( file_exists( $svg_path ) ) {
                                        $svg_content = file_get_contents( $svg_path );
                                        echo $svg_content;
                                    }
                                }
                            ?>
                            <div class="block-feature--content">
                                <?php if ( $title = get_sub_field( 'block_feature_title' ) ) : ?>
                                    <h3 class="block-feature-title"><?php esc_html_e( $title ); ?></h3>
                                <?php endif; ?>
                                <?php if ( $text = get_sub_field( 'block_feature_text' ) ) : ?>
                                    <p class="block-feature-text"><?php esc_html_e( $text ); ?></p>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php else : ?>
                        <?php
                            $svg_id = get_sub_field( 'block_feature_icon' );
                            if ( $svg_id ) {
                                $svg_path = get_attached_file( $svg_id );

                                if ( file_exists( $svg_path ) ) {
                                    $svg_content = file_get_contents( $svg_path );
                                    echo $svg_content;
                                }
                            }
                        ?>
                        <div class="block-feature--content">
                            <?php if ( $title = get_sub_field( 'block_feature_title' ) ) : ?>
                                <h3 class="block-feature-title"><?php esc_html_e( $title ); ?></h3>
                            <?php endif; ?>
                            <?php if ( $text = get_sub_field( 'block_feature_text' ) ) : ?>
                                <p class="block-feature-text"><?php esc_html_e( $text ); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e( 'No se ha encontrado ninguna Característica', 'stroyka' ); ?></p>
        <?php endif; ?>
    </div>
</section>