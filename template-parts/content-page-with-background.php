<main id="main" class="site-main" role="main">
    <article id="<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="page__image" style="background:url('<?php the_post_thumbnail_url( 'full' ); ?>'); background-repeat:no-repeat; background-position:50% 50%; background-size:cover;"></div>
        <div class="container">
            <section class="section page-body">
                <?php the_title( '<h1 class="main-title">', '</h1>' ); ?>
                <div class="post-body--content is-layout-constrained">
                    <?php the_content(); ?>
                </div>
            </section>
        </div>
    </article>
</main><!-- .site-main -->