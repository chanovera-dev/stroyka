<main id="main" class="site-main" role="main">
    <article id="<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="block post-header">
            <div class="content top">
                <div class="breadcrumbs">
                    <?php
                        if ( function_exists('wp_breadcrumbs') ) {
                            wp_breadcrumbs( '<p id="breadcrumbs">','</p>' );
                        }
                    ?>
                </div>
            </div>
        </header><!-- .post-header -->
        <div class="block">
            <div class="content page-body">
                <?php the_title( '<h1 class="main-title">', '</h1>' ); ?>
                <?php
                    if ( get_the_modified_time('d/m/Y') ) {
                        echo '<p class="latest-modified">' . esc_html__( 'Este archivo fue modificado por última vez el ', 'stories' ) . get_the_modified_time('d/m/Y') . '</p>';
                    }
                ?>
                <div class="post-body--content is-layout-constrained">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </article>
</main><!-- .site-main -->