<?php

function stroyka_theme_custom_backgrounds() {
    ?>
        <style>
            .page__image{background:url('<?php the_post_thumbnail_url( 'full' ); ?>'); background-repeat:no-repeat; background-position:50% 50%; background-size:cover;}

            #slideshow .slide1 {background:linear-gradient(to bottom, #0000005b, #00000000), url('<?php echo get_theme_mod('slide_img1_mobile', get_bloginfo('template_url') . '/assets/img/slides/1mobile.jpg'); ?>');}
            #slideshow .slide2 {background:linear-gradient(to bottom, #0000005b, #00000000), url('<?php echo get_theme_mod('slide_img2_mobile', get_bloginfo('template_url') . '/assets/img/slides/2mobile.jpg'); ?>');}
            #slideshow .slide3 {background:linear-gradient(to bottom, #0000005b, #00000000), url('<?php echo get_theme_mod('slide_img3_mobile', get_bloginfo('template_url') . '/assets/img/slides/3mobile.jpg'); ?>');}

            .catalog-link{background:linear-gradient(to bottom, #0000005b, #00000000), url('<?php echo get_theme_mod('bg_banner_mobile', get_bloginfo('template_url') . '/assets/img/banners/banner-mobile.jpg'); ?>');}

            @media(min-width:768px){
                .catalog-link{background:linear-gradient(to bottom, #0000005b, #00000000), url('<?php echo get_theme_mod('bg_banner_desktop', get_bloginfo('template_url') . '/assets/img/banners/banner-desktop.jpg'); ?>');}
            }

            @media(min-width:1024px){
                #slideshow .slide1{background:linear-gradient(to right, #0000005b, #00000000), url('<?php echo get_theme_mod('slide_img1_tablet', get_bloginfo('template_url') . '/assets/img/slides/1tablet.jpg'); ?>');}
                #slideshow .slide2{background:linear-gradient(to right, #0000005b, #00000000), url('<?php echo get_theme_mod('slide_img1_desktop', get_bloginfo('template_url') . '/assets/img/slides/2tablet.jpg'); ?>');}
                #slideshow .slide3{background:linear-gradient(to right, #0000005b, #00000000), url('<?php echo get_theme_mod('slide_img3_desktop', get_bloginfo('template_url') . '/assets/img/slides/3tablet.jpg'); ?>');}
            }

            @media(min-width:1200px){
                #slideshow .slide1{background:linear-gradient(to right, #0000005b, #00000000), url('<?php echo get_theme_mod('slide_img1_desktop', get_bloginfo('template_url') . '/assets/img/slides/1desktop.jpg'); ?>');}
                #slideshow .slide2{background:linear-gradient(to right, #0000005b, #00000000), url('<?php echo get_theme_mod('slide_img1_desktop_full', get_bloginfo('template_url') . '/assets/img/slides/2desktop.jpg'); ?>');}
                #slideshow .slide3{background:linear-gradient(to right, #0000005b, #00000000), url('<?php echo get_theme_mod('slide_img3_desktop_full', get_bloginfo('template_url') . '/assets/img/slides/3desktop.jpg'); ?>');}
            }
        </style>
    <?php
}
add_action('wp_head', 'stroyka_theme_custom_backgrounds');