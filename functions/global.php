<?php

function stroyka_theme_custom_global() {
    ?>
        <style>
            /* G E N E R A L E S */
            *,:before,:after{box-sizing:border-box;margin:0;}
            html{scroll-behavior:smooth;}
            body{font-size:16px;font-weight:400;line-height:1.5;color:var(--wp--preset--color--text);text-align:left;background:var(--wp--preset--color--background);}
            :is(header,footer,aside) :is(ol,ul){padding-left:0;list-style:none;}
            .container .section{width:var(--breakpoint);margin-inline:auto;}
            img{display:block;height:auto;}

            /* C A B E C E R A */
            #mobile-header{position:sticky;top:0;background:var(--wp--preset--color--primary-color-emphasis);z-index:2;}
            #mobile-header .header-content{display:flex;align-items:center;justify-content:space-between;height:54px;}
            #mobile-header .header-content .site-brand{margin:0 15px;}
            #mobile-header .header-content .site-brand .custom-logo{width:120px;}
            #mobile-header .header-content .searchform-wrapper{margin-left:auto;}
            /* estilos al hacer scroll */
            :is(.scroll-down,.scroll-up) .main-header{box-shadow:var(--wp--preset--shadow--header);z-index:6;}
            /* open mobile button */
            .open-menu-mobile--button{display:grid;place-content:center;width:var(--width-attachments);height:var(--height-attachments);border-radius:var(--border-radius--button);fill:var(--wp--preset--color--text);transition:all .3s ease;}
            .open-menu-mobile--button:hover{background-color:#ffffff7a;cursor:pointer;}
            /* open searchform button */
            .open-searchform-mobile--button{display:grid;place-content:center;width:var(--width-attachments);height:var(--height-attachments);border-radius:var(--border-radius--button);fill:var(--wp--preset--color--text);margin-left:auto;transition:all .3s ease;}
            .open-searchform-mobile--button:hover{background-color:#ffffff7a;cursor:pointer;}
            /* wishlist · carrito */
            .attachment-list{display:flex;justify-self:end;}
            .attachment-list li .counter{position:relative;display:grid;place-content:center;width:var(--width-attachments);height:var(--height-attachments);border-radius:var(--border-radius--button);transition:all .3s ease;}
            .attachment-list li .counter:focus{outline:none;}
            .attachment-list li .counter:hover{background-color:#ffffff7a;}
            .attachment-list li .counter svg{fill:var(--wp--preset--color--text);}
            .attachment-list li .counter .wrapper{position:absolute;top:var(--position--counter);right:var(--position--counter);}
            .attachment-list li .counter .wrapper .number{display:grid;width:15px;height:15px;place-content:center;background-color:var(--wp--preset--color--background);border-radius:50%;color:var(--wp--preset--color--text);font-size:10px;}
            /* cabecera · mobile · caja de búsqueda */
            #mobile-header .searchform-wrapper{position:absolute;top:-100%;left:0;width:100%;height:100%;border-radius:0;background-color:var(--wp--preset--color--background);z-index:4;transition:all .3s ease;}
            #mobile-header .searchform-wrapper.active{top:0;box-shadow:0 1px 7px rgb(0 0 0 / 25%);}
            #mobile-header .searchform-wrapper .searchform{position:relative;justify-content:flex-start;}
                /* botones */
                #mobile-header .searchform-wrapper .searchform #search-buttons{position:absolute;top:0;right:0;display:flex;}
                #mobile-header .searchform-wrapper .searchform #search-buttons :is(#searchbar--button,#close-searchbar--button){width:54px;height:54px;display:grid;place-content:center;}
                #mobile-header .searchform-wrapper .searchform #search-buttons div svg{fill:var(--wp--preset--color--attenuated);}
                #mobile-header .searchform-wrapper .searchform #search-buttons #close-searchbar--button{display:grid;transition:all .3s ease;}
                #mobile-header .searchform-wrapper .searchform #search-buttons #close-searchbar--button:hover{cursor:pointer;color:var(--wp--preset--color--text);}
                /* formulario */
                #mobile-header .searchform-wrapper .searchform input[type=text]{width:min(100% - 50px); height:54px; border:0 solid transparent; border-right:1px solid var(--wp--preset--color--border);background-color:var(--wp--preset--color-background-input);padding:0 54px 0 10px;font-family:'Roboto';font-size:16px;}
                #mobile-header .searchform-wrapper .searchform input[type=text]:focus{outline:none;}
            /* menú mobile */
            .panel-overlay{position:fixed;width:100%;height:100%;top:0;left:-100%;z-index:7;opacity:0;background:rgb(61 70 81 / 90%);backdrop-filter:blur(20px);transition:opacity .3s ease;}
            .panel-overlay.show{left:0;opacity:1;}
            .menu-mobile--wrapper{position:fixed;top:0;left:-100%;width:100%;max-width:290px;height:100svh;background-color:var(--wp--preset--color--background);transition:all .3s ease; z-index:8;}
            .menu-mobile--wrapper.open{left:0;box-shadow:0 10px 21px rgba(0 0 0 / 25%);}
                /* nombre del menú y botón de cerrado */
                .menu-mobile--wrapper .name-menu--wrapper{display:flex;align-items:center;justify-content:space-between;height:54px;border-bottom:1px solid var(--wp--preset--color--line);}
                .menu-mobile--wrapper .name-menu--wrapper .name-menu{padding:0 20px;}
                .menu-mobile--wrapper .name-menu--wrapper #close-menu-mobile{width:54px;height:54px;border:none;border-left:1px solid var(--wp--preset--color--line);border-bottom:1px solid var(--wp--preset--color--line);display:grid;place-content:center;background-color:var(--wp--preset--color--background);}
                .menu-mobile--wrapper .name-menu--wrapper #close-menu-mobile svg{fill:var(--wp--preset--color--mbc);transition:all .3s ease;}
                .menu-mobile--wrapper .name-menu--wrapper #close-menu-mobile:hover svg{fill:var(--wp--preset--color--text);} 
                /* listas */
                #menu-mobile{height:100%;overflow-y:scroll;padding-bottom:80px;}
                #menu-mobile::-webkit-scrollbar,
                .menu-mobile::-webkit-scrollbar{display:none;}
                #menu-mobile ul{padding:0;}
                #menu-mobile ul li a{padding:0 20px;display:flex;align-items:center;height:48px;color:var(--wp--preset--color--text);border-bottom:1px solid var(--wp--preset--color--line);border-radius:0;}
                #menu-mobile ul li ul li a{padding-left:40px;}
                #menu-mobile ul li ul li ul li a{padding-left:60px;border-bottom:1px solid #e3e3e3;}
                /* submenús */
                #menu-mobile > ul li.menu-item-has-children{position:relative;}
                    /* botón */
                    #menu-mobile > ul li.menu-item-has-children .mobile-links__item-toggle{position:absolute;top:0;right:0;width:48px;height:48px;background-color:var(--wp--preset--color--background);border:none;border-left:1px solid var(--wp--preset--color--line);border-bottom:1px solid var(--wp--preset--color--line);border-radius:0;}
                    #menu-mobile > ul li.menu-item-has-children ul li.menu-item-has-children .mobile-links__item-toggle{height:40px;background-color:#f7f7f7;}
                    #menu-mobile > ul li.menu-item-has-children .mobile-links__item-toggle svg{transition:all .3s ease;}
                    #menu-mobile > ul li.menu-item-has-children .mobile-links__item-toggle.rotate svg{transform:rotate(180deg);}
                    /* submenú */
                    #menu-mobile ul li.menu-item-has-children ul.sub-menu{
                        overflow: hidden;
                        max-height: 0;
                        transition: all 0.5s ease-out;
                    }
                    #menu-mobile > ul li.menu-item-has-children > ul.sub-menu li a{font-size:14px;height:40px;background-color:#f7f7f7;}
                    #menu-mobile > ul li.menu-item-has-children > ul.sub-menu li ul.sub-menu li a{background-color:#f0f0f0;}
                    #menu-mobile ul li.menu-item-has-children ul.sub-menu.open{
                        display: block;
                        max-height: 2200px;
                    }
            /* top bar */
            .top-bar--wrapper{background-color:var(--wp--preset--color--background-top-bar);}
            .top-bar{display:flex;justify-content:space-between;}
            .top-bar ul{display:flex;}
            .top-bar ul li a{display:flex;align-items:center;height:32px;padding:0 10px;font-size:14px;color:var(--wp--preset--color--top-bar);border-radius:0;transition:all .3s ease;}
            .top-bar ul li a:hover{color:var(--wp--preset--color--links);}
                /* submenú */
                .top-bar ul li.menu-item-has-children{position:relative;}
                .top-bar ul li.menu-item-has-children a{padding:0;}
                .top-bar ul li.menu-item-has-children .mobile-links__item-toggle{position:relative;display:flex;align-items:center;font-size:14px;color:var(--wp--preset--color--top-bar);padding:0 10px;padding-right:20px;height:32px;border-radius:0;border:none;background-color:transparent;transition:all .3s ease;}
                .top-bar ul li.menu-item-has-children .mobile-links__item-toggle:hover{background-color:var(--wp--preset--color--line);color:var(--wp--preset--color--text);}
                .top-bar ul li.menu-item-has-children .mobile-links__item-toggle svg{position:absolute;width:10px;height:10px;top:9px;right:5px;transition:all .3s ease;}
                .top-bar ul li.menu-item-has-children .mobile-links__item-toggle.rotate{background-color:var(--wp--preset--color--line);color:var(--wp--preset--color--text);}
                .top-bar ul li.menu-item-has-children .mobile-links__item-toggle.rotate svg{transform:rotate(180deg);}
                .top-bar ul li.menu-item-has-children ul.sub-menu{position:absolute;top:32px;display:grid;background-color:var(--wp--preset--color--background);max-height:0;overflow:hidden;z-index:4;transition:all .3s ease;}
                .top-bar ul li.menu-item-has-children ul.sub-menu li a{display:flex;align-items:center;min-width:240px;height:30px;font-weight:700;color:var(--wp--preset--color--text);padding:0 21px;}
                .top-bar ul li.menu-item-has-children ul.sub-menu li a:hover{background-color:#f2f2f2;}
                .top-bar ul li.menu-item-has-children ul.sub-menu.open{max-height:500px;box-shadow:var(--wp--preset--shadow--submenu);padding:6px 0;}
                .top-bar nav:nth-child(1) ul li.menu-item-has-children ul.sub-menu{left:0;}
                .top-bar nav:nth-child(2) ul li.menu-item-has-children ul.sub-menu{right:0;}
                .top-bar nav:nth-child(2) ul li.menu-item-has-children ul.sub-menu li a{justify-content:end;}
            /* middle bar */
            .middle-bar-wrapper{background-color:var(--wp--preset--color--background);}
            .middle-bar{display:grid;align-items:center;grid-template-columns:var(--grid-columns--middle-bar);height:104px;}
                /* searchform */
                .searchform-wrapper{width:100%;height:36px;}
                .searchform-wrapper .searchform{position:relative;display:inherit;}
                .searchform-wrapper .searchform #search-buttons{height:42px;position:absolute;top:0;right:0;}
                .searchform-wrapper .searchform #search-buttons #searchbar--button{width:42px;height:42px;display:grid;place-content:center;fill:var(--wp--preset--color--attenuated);}
                .searchform-wrapper .searchform #search-buttons #close-searchbar--button{display:none;}
                .searchform-wrapper .searchform input[type=text]{height:42px;width:100%;padding:0;border:2px solid #e3e3e3;padding:0 42px 0 10px;border-radius:var(--border-radius--button);background-color:#ffffff7a;font-size:16px;transition:all .3s ease;}
                .searchform-wrapper .searchform input[type=text]:hover{border:2px solid #d4d4d4;}
                .searchform-wrapper .searchform input[type=text]:focus{outline:none;border:2px solid var(--wp--preset--color--primary-color-emphasis);}
                .searchform-wrapper .searchform input[type=text]::placeholder{color:var(--wp--preset--color--attenuated);}
                .searchform-wrapper .searchform input[type=text]:focus::placeholder{color:var(--wp--preset--color--attenuated);}
                /* customer service */
                #customer-service-phone{text-align:right;}
                #customer-service-phone p:nth-child(1){font-size:15px;margin-bottom:3px;color:#999;}
                #customer-service-phone p span{font-size:20px;font-weight:700;color:var(--wp--preset--color--text);}
            /* bottom bar */
            #desktop-main-header{background-color:var(--wp--preset--color--primary-color-emphasis);position:sticky;top:0;z-index:2;}
            .bottom-bar{display:grid;align-items:center;grid-template-columns:var(--grid-columns--bottom-bar);height:54px;}
                /* botón de comprar por categorías */
                .bottom-bar .departments-button{
                    width:100%;
                    height:42px;
                    padding:0 14px;
                    display:flex;
                    gap:14px;
                    align-items:center;
                    justify-content:space-between;
                    background-color:var(--wp--preset--color--text);
                    border:var(--wp--preset--color--text);
                    color:#fff;
                    fill:#859ba6;
                    font-size:15px;
                    font-weight:700;
                    cursor:pointer;
                    transition:all .3s ease;
                }
                .bottom-bar .departments-button:hover{fill:#fff;}
                .bottom-bar .departments-button:focus{outline:none;box-shadow:none;}
                .bottom-bar .departments-button .departments__button-arrow{margin-left:auto;transition:all .3s ease;}
                .bottom-bar .departments-button .departments__button-arrow.rotate{transform:rotate(180deg);}
                    /* botón de comprar por categorías · lista */
                    .bottom-bar .categories-list-wrapper{position:relative;}
                    .bottom-bar .categories-list-wrapper .categories-list{position:absolute;left:0;top:42px;background-color:var(--wp--preset--color--text);padding:0;width:100%;max-height:0;overflow:hidden;transition:all .3s ease;}
                    .bottom-bar .categories-list-wrapper .categories-list li a{font-weight:400;position:relative;display:block;padding:10px 16px;color:#fff;font-size:14px;line-height:16px;letter-spacing:.02em;transition:all .3s ease;}
                    .bottom-bar .categories-list-wrapper .categories-list li a:hover{background-color:#525d66;}
                    /* botón de comprar por categorías · lista abierta */
                    .bottom-bar .categories-list-wrapper .categories-list.open{background-color:var(--wp--preset--color--text);padding:6px 0;height:416px;max-height:416px;overflow-y:scroll;}
                    .bottom-bar .categories-list-wrapper .categories-list.open::-webkit-scrollbar{display:none;}     
                /* menú */
                .bottom-bar nav{margin:0 14px 0 8px;}
                .bottom-bar nav ul{display:flex;align-items:center;}
                .bottom-bar nav > ul > li{position:relative;display:flex;align-items:center;height:54px;}
                .bottom-bar nav ul li a{font-size:15px;font-weight:600;color:var(--wp--preset--color--text);display:flex;align-items:center;height:42px;border-radius:var(--border-radius--button);padding:0 14px;transition:all .3s ease;}
                .bottom-bar nav ul li a:hover{background-color:#ffffff7a;}
                .bottom-bar nav ul li a:focus{box-shadow:none;}
                .bottom-bar nav ul li.menu-item-has-children a{padding-right:27px;}
                .bottom-bar nav ul li.menu-item-has-children a.hover{background-color:#ffffff7a;}
                .bottom-bar nav ul li.menu-item-has-children svg{width:13px;height:13px;position:absolute;top:38%;right:8px;}
                /* sub menú · cerrado */
                .bottom-bar nav ul li.menu-item-has-children ul.sub-menu{position:absolute;top:54px;display:grid;background-color:var(--wp--preset--color--background);padding:0;max-height:0;overflow:hidden;transition:all .3s ease;}
                .bottom-bar nav ul li.menu-item-has-children ul.sub-menu li a{height:32px;font-size:15px;font-weight:400;min-width:240px;transition:all .3s ease;}
                /* sub menú · abierto */
                .bottom-bar nav ul li.menu-item-has-children ul.sub-menu.open{padding:6px 0;max-height:1000px;box-shadow:var(--wp--preset--shadow--submenu);}
                .bottom-bar nav ul li.menu-item-has-children ul.sub-menu.open li a:hover{background-color:#e6e6e6;}

            /* sidebar woocommerce mobile */
            .sidebar-woocommerce--wrapper{position:fixed;top:0;left:-100%;width:100%;max-width:290px;height:100svh;background-color:var(--wp--preset--color--background);overflow-x:hidden;overflow-y:scroll;transition:all .3s ease; z-index:8;}
            .sidebar-woocommerce--wrapper.open{left:0;}
                /* nombre del menú y botón de cerrado */
                .sidebar-woocommerce--wrapper .name-sidebar--wrapper{display:flex;align-items:center;justify-content:space-between;height:54px;border-bottom:1px solid var(--wp--preset--color--border);}
                .sidebar-woocommerce--wrapper .name-sidebar--wrapper .name-sidebar{padding:0 20px;}
                .sidebar-woocommerce--wrapper .name-sidebar--wrapper #close-sidebar-mobile{width:54px;height:54px;border:none;border-left:1px solid var(--wp--preset--color--border);border-bottom:1px solid var(--wp--preset--color--border);display:grid;place-content:center;background-color:var(--wp--preset--color--background);}
                .sidebar-woocommerce--wrapper .name-sidebar--wrapper #close-sidebar-mobile svg{fill:var(--wp--preset--color--attenuated);transition:all .3s ease;}
                .sidebar-woocommerce--wrapper .name-sidebar--wrapper #close-sidebar-mobile:hover svg{fill:var(--wp--preset--color--text);}
                #sidebar-woocommerce--wrapper .yith-wcan-filters .yith-wcan-filter{padding:0 20px;}
                #sidebar-woocommerce--wrapper .yith-wcan-filters .yith-wcan-filter .filter-title{margin-bottom:20px;font-size:20px;}

            /* P I E   D E   P Á G I N A */
            /* pie de página */
            #main-footer{position:relative;text-align:var(--text-align--footer);padding-top:16px;}
                /* general de widgets */
                .footer-widgets--wrapper{border-top:1px solid var(--wp--preset--color--line);}
                    .footer-widgets{padding:48px 0 54px;display:grid;gap:42px;grid-template-columns:var(--grid-footer--widgets);}
                    .footer-widgets .menus{display:grid;grid-template-columns:1fr 1fr;gap:30px;}
                    .footer-widgets h2{margin-bottom:var(--margin-bottom--h2--footer);font-size:20px;}
                    .footer-widgets .newsletter{grid-column:var(--grid-column--newsletter--footer); max-width:420px;}
                    .footer-widgets .newsletter p{margin-top:0;margin-bottom:14px;}
                    .footer-widgets :is(.contact,.newsletter) h2{font-size:var(--font-size--xx--h2--footer);margin-bottom:var(--margin-bottom--xx--h2--footer);}
                    .footer-widgets li{display:flex;gap:7px;align-items:center;justify-content:var(--justify-content--li--footer); min-height:28px;}
                    .footer-widgets a{color:var(--wp--preset--color--text);display:inline-flex;align-items:center;gap:7px;transition:all .3s ease;}
                    .footer-widgets a:hover{color:var(--wp--preset--color--links);}
                    .footer-widgets a:focus{border-bottom:1px solid var(--wp--preset--color--links);}
                    /* dirección */
                    .footer-widgets address{font-style:normal;}
                    /* boletín de noticias */
                    .footer-widgets .tnp-subscription form{display:grid;grid-template-columns:1fr 113.5px;gap:6px;align-items:end;max-width:380px;}
                    .footer-widgets .tnp-subscription form .tnp-field-email{text-align:left;}
                    .footer-widgets .tnp-subscription form .tnp-field-email input[type=email]{width:100%;height:38px;padding:0 12px;font-size:15px;font-family:var(--wp--preset--font-family--body);color:var(--wp--preset--color--color-input);background-color:var(--wp--preset--color--background-input);border:1px solid var(--wp--preset--color--border-input);display:flex;align-items:center;border-radius:var(--border-radius--button);transition:all .3s ease;}
                    .footer-widgets .tnp-subscription form .tnp-field-email input[type=email]:focus{outline:none;border:1px solid var(--wp--preset--color--border-input-focus);box-shadow:var(--wp--preset--shadow--input);}
                    .footer-widgets .tnp-subscription form .tnp-field-button input[type=submit]{width:100%;height:38px;display:grid;place-content:center;padding:0 12px;font-size:16px;font-weight:700;border:1px solid var(--wp--preset--color--primary-color-emphasis);background-color:var(--wp--preset--color--primary-color-emphasis);color:var(--wp--preset--color--text);border-radius:var(--border-radius--button);transition:all .3s ease;}
                    .footer-widgets .tnp-subscription form .tnp-field-button :is(input[type=submit]:hover,input[type=submit]:focus){outline:none;border:1px solid var(--wp--preset--color--text);background-color:var(--wp--preset--color--text);color:#fff;}
                    /* redes sociales */
                    .footer-widgets .social{margin-top:16px;}
                    .footer-widgets .social .menu{justify-content:var(--justify-content--social--footer);}
                /* copyright */
                #main-footer .copyright{padding:20px 0 24px;display:grid;border-top:1px solid var(--wp--preset--color--line);}
                #main-footer .copyright .payments{margin-bottom:var(--margin-bottom--payments--footer);}
                #main-footer .copyright .payments img{margin-inline:auto;}
                #main-footer .copyright p{font-size:14px;line-height:1.5;}
                #main-footer .copyright p a:focus{border-bottom:1px solid var(--wp--preset--color--links);}
            /* redes sociales */
            .social .menu{display:flex;align-items:center;gap:7px;}
            .social .menu li a{display:inline-flex;align-items:center;gap:0;height:34px;padding:0 9px;border-radius:50%;font-size:0;}
            .social .menu li a:before{position:relative;padding:8px;display:inline-block;}
            .social .menu li a:focus{outline:none;background-color:var(--wp--preset--color--links)!important;}
            .social .menu li a[href*="facebook"]{background-color:#3c5a99;}
            .social .menu li a[href*="twitter"]{background-color:#00a2e8;}
            .social .menu li a[href*="youtube"]{background-color:#e52e2e;}
            .social .menu li a[href*="instagram"]{background-color:#815dc7;}
            .social .menu li a[href*="google"]{background-color:#e52e2e;}
        </style>
    <?php
}
add_action('wp_head', 'stroyka_theme_custom_global');