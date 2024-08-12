<?php
    get_header();

    echo '
    <main id="main">';
    if (has_post_thumbnail() == false) :
        echo '
        <div class="container main-content">
            <section class="section">
                <div class="breadcrumbs">'; get_breadcrumb(); echo '</div>
            </section>
            <article class="section content border-section">';
                the_title('<h1 class="title">', '</h1>');
                the_content();
            echo '
            </article>
        </div>';
    else:
        echo '
        <div class="container page__image"></div>
        <div class="container">
            <article class="section content upload">';
                the_title('<h1 class="title">', '</h1>');
                the_content();
            echo '
            </article>
        </div>';
    endif;
    echo '
    </main>';

    get_footer();