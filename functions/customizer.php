<?php

function theme_customizer($wp_customize) {
    // Datos de contacto
    $wp_customize->add_section('contact__data', array(
        'title' => __('Datos de contacto'),
        'description' => __('Establece los datos de contacto'), 
        'priority' => 11,
    ));
        // phone number
        $wp_customize->add_setting('phone_number', array(
            'default' => __('2299216844'),
        ));
        $wp_customize->add_control('phone_number', array(
            'label' => 'Teléfono de contacto',
            'section' => 'contact__data',
        ));
        // whatsapp number
        $wp_customize->add_setting('whatsapp_number', array(
            'default' => __('2299222433'),
        ));
        $wp_customize->add_control('whatsapp_number', array(
            'label' => 'Número para WhatsApp',
            'section' => 'contact__data',
        ));
        // email office
        $wp_customize->add_setting('email_office', array(
            'default' => __('pinplast@hotmail.com'),
        ));
        $wp_customize->add_control('email_office', array(
            'label' => 'Email de oficina',
            'section' => 'contact__data',
        ));
        // schedule 1
        $wp_customize->add_setting('schedule_line1', array(
            'default' => __('Lu - Vi de 9:00 a 18:00 hrs'),
        ));
        $wp_customize->add_control('schedule_line1', array(
            'label' => 'Horario de atención',
            'section' => 'contact__data',
        ));
        $wp_customize->add_setting('schedule_line2', array(
            'default' => __('Sábados de 9:00 a 14:00 hrs'),
        ));
        $wp_customize->add_control('schedule_line2', array(
            'label' => '',
            'section' => 'contact__data',
        ));
        // address
        $wp_customize->add_setting('address_line1', array(
            'default' => __('Urano # 26'),
        ));
        $wp_customize->add_control('address_line1', array(
            'label' => 'Dirección',
            'section' => 'contact__data',
        ));
        $wp_customize->add_setting('address_line2', array(
            'default' => __('entre Progreso y Acapulco.'),
        ));
        $wp_customize->add_control('address_line2', array(
            'label' => '',
            'section' => 'contact__data',
        ));
        $wp_customize->add_setting('address_line3', array(
            'default' => __('Fracc. Jardines de Mocambo.'),
        ));
        $wp_customize->add_control('address_line3', array(
            'label' => '',
            'section' => 'contact__data',
        ));

    //Panel Frontpage
    $wp_customize->add_panel('frontpage', array(
        'title' => 'Página de inicio',
        'priority' => 20,
        'capability' => 'edit_theme_options',
    ));
        // hero section
        $wp_customize->add_section('welcome', array(
            'title' => 'Slideshow de entrada',
            'description' => __('Bienvenida'),
            'panel' => 'frontpage',
        ));
            // S L I D E   1
            // background slide 1 - mobile
            $wp_customize->add_setting('slide_img1_mobile', array(
                'default' => get_bloginfo('template_url') . '/assets/img/slides/1mobile.jpg',
            ));
            $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'slide_img1_mobile', array(
                'label' => 'Fondo del slide 1 en modo mobile',
                'section' => 'welcome',
            )));
            // background slide 1 - tablet
            $wp_customize->add_setting('slide_img1_tablet', array(
                'default' => get_bloginfo('template_url') . '/assets/img/slides/1tablet.jpg',
            ));
            $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'slide_img1_tablet', array(
                'label' => 'Fondo del slide 1 en modo tablet',
                'section' => 'welcome',
            )));
            // background slide 1 - desktop
            $wp_customize->add_setting('slide_img1_desktop', array(
                'default' => get_bloginfo('template_url') . '/assets/img/slides/1desktop.jpg',
            ));
            $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'slide_img1_desktop', array(
                'label' => 'Fondo del slide 1 en modo desktop',
                'section' => 'welcome',
            )));
            // slide 1 -- titulo
            $wp_customize->add_setting('slide1_title', array(
                'default' => __('Protección Total con Nuestros Impermeabilizantes.'),
            ));
            $wp_customize->add_control('slide1_title', array(
                'label' => 'Título del slide 1',
                'section' => 'welcome',
            ));
            // slide1 -- subtitulo
            $wp_customize->add_setting('slide1_subtitle', array(
                'default' => __('Descubre fórmulas avanzadas para resguardar tu hogar de filtraciones y humedad.'),
            ));
            $wp_customize->add_control('slide1_subtitle', array(
                'label' => 'Subtítulo del slide 1',
                'section' => 'welcome',
                'type' => 'textarea',
            ));
            // S L I D E   2
            // background slide 2 - mobile
            $wp_customize->add_setting('slide_img2_mobile', array(
                'default' => get_bloginfo('template_url') . '/assets/img/slides/2mobile.jpg',
            ));
            $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'slide_img2_mobile', array(
                'label' => 'Fondo del slide 2 en modo mobile',
                'section' => 'welcome',
            )));
            // background slide 2 - tablet
            $wp_customize->add_setting('slide_img2_tablet', array(
                'default' => get_bloginfo('template_url') . '/assets/img/slides/2tablet.jpg',
            ));
            $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'slide_img2_tablet', array(
                'label' => 'Fondo del slide 2 en modo tablet',
                'section' => 'welcome',
            )));
            // background slide 2 - desktop
            $wp_customize->add_setting('slide_img2_desktop', array(
                'default' => get_bloginfo('template_url') . '/assets/img/slides/2desktop.jpg',
            ));
            $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'slide_img2_desktop', array(
                'label' => 'Fondo del slide 2 en modo desktop',
                'section' => 'welcome',
            )));
            // slide 2 -- titulo
            $wp_customize->add_setting('slide2_title', array(
                'default' => __('Colores que Transforman, Calidad que Perdura.'),
            ));
            $wp_customize->add_control('slide2_title', array(
                'label' => 'Título del slide 2',
                'section' => 'welcome',
            ));
            // slide2 -- subtitulo
            $wp_customize->add_setting('slide2_subtitle', array(
                'default' => __('Explora nuestra paleta de pinturas premium para renovar tus espacios con durabilidad y estilo.'),
            ));
            $wp_customize->add_control('slide2_subtitle', array(
                'label' => 'Subtítulo del slide 2',
                'section' => 'welcome',
                'type' => 'textarea',
            ));
            // S L I D E   3
            // background slide 3 - mobile
            $wp_customize->add_setting('slide_img3_mobile', array(
                'default' => get_bloginfo('template_url') . '/assets/img/slides/3mobile.jpg',
            ));
            $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'slide_img3_mobile', array(
                'label' => 'Fondo del slide 3 en modo mobile',
                'section' => 'welcome',
            )));
            // background slide 3 - tablet
            $wp_customize->add_setting('slide_img3_tablet', array(
                'default' => get_bloginfo('template_url') . '/assets/img/slides/3tablet.jpg',
            ));
            $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'slide_img3_tablet', array(
                'label' => 'Fondo del slide 3 en modo tablet',
                'section' => 'welcome',
            )));
            // background slide 3 - desktop
            $wp_customize->add_setting('slide_img3_desktop', array(
                'default' => get_bloginfo('template_url') . '/assets/img/slides/3desktop.jpg',
            ));
            $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'slide_img3_desktop', array(
                'label' => 'Fondo del slide 3 en modo desktop',
                'section' => 'welcome',
            )));
            // slide 3 -- titulo
            $wp_customize->add_setting('slide3_title', array(
                'default' => __('Soluciones Rápidas con Impermeabilizantes Prefabricados.'),
            ));
            $wp_customize->add_control('slide3_title', array(
                'label' => 'Título del slide 3',
                'section' => 'welcome',
            ));
            // slide3 -- subtitulo
            $wp_customize->add_setting('slide3_subtitle', array(
                'default' => __('Simplifica tu proyecto con nuestros impermeabilizantes listos para usar, diseñados para adaptarse a cualquier desafío.'),
            ));
            $wp_customize->add_control('slide3_subtitle', array(
                'label' => 'Subtítulo del slide 3',
                'section' => 'welcome',
                'type' => 'textarea',
            ));
        // banner section
        $wp_customize->add_section('banner', array(
            'title' => 'Banner del frontpage',
            'description' => __('Banner del frontpage'),
            'panel' => 'frontpage',
        ));
            // background banner - mobile
            $wp_customize->add_setting('bg_banner_mobile', array(
                'default' => get_bloginfo('template_url') . '/assets/img/banners/banner-mobile.jpg',
            ));
            $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'bg_banner_mobile', array(
                'label' => 'Fondo del banner en modo mobile',
                'section' => 'banner',
            )));
            // background banner - desktop
            $wp_customize->add_setting('bg_banner_desktop', array(
                'default' => get_bloginfo('template_url') . '/assets/img/banners/banner-desktop.jpg',
            ));
            $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'bg_banner_desktop', array(
                'label' => 'Fondo del banner en modo desktop',
                'section' => 'banner',
            )));
            // banner -- titulo
            $wp_customize->add_setting('banner_title', array(
                'default' => __('Cientos'),
            ));
            $wp_customize->add_control('banner_title', array(
                'label' => 'Título del banner',
                'section' => 'banner',
            ));
            // banner -- subtitulo
            $wp_customize->add_setting('banner_subtitle', array(
                'default' => __('Brochas, rodillos, bases, etcétera, etcétera ...'),
            ));
            $wp_customize->add_control('banner_subtitle', array(
                'label' => 'Subtítulo del banner',
                'section' => 'banner',
                'type' => 'textarea',
            ));

}
add_action('customize_register', 'theme_customizer');