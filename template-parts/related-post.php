<article class="archive-post">
    <header class="archive-post--header">
        <?php
            if ( ! has_post_thumbnail() == false ) {
                echo '<a href="'; the_permalink(); echo '"><img class="thumbnail" src="'; the_post_thumbnail_url( 'media' ); echo '" alt="Picture post" loading="lazy" width="300" height="200"></a>';
            }
        ?>
    </header><!-- .archive-post--header -->
    <div class="archive-post--content">
        <div class="category date"><?php echo get_the_date(); ?></div>
        <a href="<?php the_permalink(); ?>" class="archive-post--permalink">
            <?php the_title( '<h3 class="archive-post--title">', '</h3>' ); ?>
        </a>
    </div><!-- .archive-post--content -->
</article><!-- .archive-post -->