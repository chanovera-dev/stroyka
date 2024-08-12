<article class="post">
    <?php if ( has_post_thumbnail() == false ) : ?>
    <img class="thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog.webp" alt="Imagen del artículo" loading="lazy" width="90" height="70">
    <?php else: ?>
    <img class="thumbnail" src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="Imagen del artículo" loading="lazy" width="90" height="70">
    <?php endif; ?>
    <a class="permalink" href="<?php the_permalink() ?>" target="_blank">
        <?php the_title( '<h4>', '</h4>' ); ?>
    </a>
    <?php include(TEMPLATEPATH . '/parts/widgets/publicate-date.php'); ?>
</article>