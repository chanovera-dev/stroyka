<?php

function stroyka_theme_custom_icons() {
    ?>
        <style>          
            /* iconos de redes sociales */
            .social .menu li a[href*="facebook"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/facebook.svg');}
            .social .menu li a[href*="twitter"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/twitter.svg');}
            .social .menu li a[href*="youtube"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/youtube.svg');}
            .social .menu li a[href*="instagram"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/instagram.svg');}
            .social .menu li a[href*="google"]:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/google.svg');}

            /* iconos de woocommerce */
            .woocommerce-product-gallery__trigger:before{background:url('<?php echo get_template_directory_uri(); ?>/assets/icons/zoom-in.svg');}

            /* estrellas para calificar */
            .woocommerce p.stars a:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/star.svg');}
            .woocommerce p.stars a.star-1:hover:before,
            .woocommerce p.stars a.star-2:hover:before,
            .woocommerce p.stars a.star-3:hover:before,
            .woocommerce p.stars a.star-4:hover:before,
            .woocommerce p.stars a.star-5:hover:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/star-fill.svg');}
            .woocommerce p.stars a.star-1.active:before,
            .woocommerce p.stars a.star-2.active:before,
            .woocommerce p.stars a.star-3.active:before,
            .woocommerce p.stars a.star-4.active:before,
            .woocommerce p.stars a.star-5.active:before{content: ''; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/icons/star-fill.svg');}
        </style>
    <?php
}
add_action('wp_head', 'stroyka_theme_custom_icons');