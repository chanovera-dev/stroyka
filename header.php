<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="site">
            <?php
                include(TEMPLATEPATH.'/parts/header/menu-mobile.php');
                include(TEMPLATEPATH.'/parts/sidebars/woocommerce-mobile.php');
            ?>
            <div id="panel-overlay" class="panel-overlay"></div>
            <!-- mobile header start -->
            <header id="mobile-header" class="container main-header">
                <section class="section header-content">
                    <?php
                        include(TEMPLATEPATH.'/parts/header/menu-button.php');
                        include(TEMPLATEPATH.'/parts/header/brand.php');
                        get_search_form();
                        include(TEMPLATEPATH.'/parts/header/attachments.php');
                    ?>
                </section>
            </header>
            <!-- mobile header end -->