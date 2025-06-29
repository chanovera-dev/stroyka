<?php
/**
 * Main Single Page Template
 * 
 * @package Stroyka
 * @since 1.0.0
 */
get_header();

if ( have_posts() ) {

    while( have_posts() ) {

        the_post();
        
        if ( has_post_thumbnail() == false ) {

            get_template_part( 'template-parts/content', 'page' );

        } else {

            get_template_part( 'template-parts/content', 'page-with-background' );

        }

    }

}

get_footer();