<?php

function stroyka_theme_custom_breakpoints() {
    ?>
        <style>
            :root{
                /* media queries */
                --breakpoint:min(100% - 30px, 575px);
                --breakpoint-without-padding:min(100%, 575px);

                /* inputs y botones */
                --border-radius--button:2px;

                /* cabecera */
                --width-attachments:40px;
                --height-attachments:36px;
                --position--counter:0;

                /* pie de página */
                --text-align--footer:center;
                --grid-footer--widgets:1fr;
                --grid-column--newsletter--footer:1/-1;
                --margin-bottom--h2--footer:12px;
                --font-size--xx--h2--footer:28px;
                --margin-bottom--xx--h2--footer:16px;
                --justify-content--li--footer:center;
                --justify-content--social--footer:center;
                --margin-bottom--payments--footer:24px;

                /* frontpage */
                    /* hero */
                    --font-size-title-slide:26px;
                    --line-height-title-slide:1.3;
                    --margin-bottom-title-slide:20px;
                    --text-align--slide-content:center;
                    --padding--slide:26px 15px 50px;
                    --margin-top--slide-button:6px;
                    --slideshow-buttons-size:10px;
                    /* catalog */
                    --height-catalog:390px;
                    /* map */
                    --height-map--contact:300px;
                
                /* separations */
                --margin-bottom--post:30px;
                --top--onsale:15px;

                /* shop */
                    /* lists */
                    --padding--link-to-product:15px;
                    --padding--product-card-info:0 15px;
                    --padding--product-card__buttons:0 15px 15px 15px;
                    --position--product-card__buttons:relative;
                    --max-height--product-card__buttons:300px;
                    --grid-template-columns--lists:1fr 1fr;
                    /* sidebar */
                    --display--sidebar--woocommerce:none;
                
                /* página */
                --height-header:330px;
                --content-upload:-290px;
                --margin-bottom--title:30px;
                --font-size--titles-page:30px;
                --padding-content--page:26px 20px 40px;
                --margin-bottom--post:3rem;
                --margin-bottom-post-thumbnail--single:24px;
                --margin-blockquote:36px;
                --margin-h2--single:40px 0 16px;
                --margin-h3--single:35px 14px;
                --margin-lists--single:24px 0;

                /* error 404 */
                --font-size-title--error404:50px;
                --line-height-title--error404:54px;
                --padding-title--error404:40px 0 32px;
                --color-title--error404:#ebebeb;
                --margin-bottom-content--error404:40px;

                /*  blog */
                --separation-posts:36px;
                --gap--posts-wrapper:36px;
            }

            #products{display:none;}

            @media screen and (min-width: 31px) and (max-width: 767px){
                :root{
                }
                /* frontpage */
                    /* hero */
                    .slideshow-wrapper .slideshow .slide .content .excerpt{display:none;}
                    /* best selling */
                    #main .container .best-selling.section{width:100%;}
            }

            @media(min-width:419px){
                :root{
                    /* tienda */
                    --gap--lists:10px;
                }
            }

            @media(max-width:574px) {
                /* cabecera */
                    .wishlist-button{display:none;}
            }

            @media(min-width:575px){
                :root{
                    /* media queries */
                    --breakpoint:min(100% - 30px, 510px);
                    --breakpoint-without-padding:min(100%, 510px);
                }

                /* cabecera */
                    .open-searchform-mobile--button{display:none;}
                    /* cabecera · mobile · caja de búsqueda */
                    #mobile-header .searchform-wrapper{width:63%;height:36px;margin-right:8px;position:relative;top:0;background:transparent;}
                    #mobile-header .searchform-wrapper .searchform{position:relative;}
                        /* botones */
                        #mobile-header .searchform-wrapper .searchform #search-buttons{height:36px;position:absolute;top:0;right:0;}
                        #mobile-header .searchform-wrapper .searchform #search-buttons #searchbar--button{width:36px;height:36px;display:grid;place-content:center;}
                        #mobile-header .searchform-wrapper .searchform #search-buttons #searchbar--button svg{fill:rgb(0 0 0 / 30%);transition:all .3s ease;}
                        #mobile-header .searchform-wrapper .searchform #search-buttons #searchbar--button:hover svg{fill:var(--wp--preset--color--text);}
                        #mobile-header .searchform-wrapper .searchform #search-buttons #close-searchbar--button{display:none;}
                        /* formulario */
                        #mobile-header .searchform-wrapper .searchform input[type=text]{height:36px;width:100%;padding:0 36px 0 10px;border:none; border-radius:var(--border-radius--button);background-color:#ffffff7a;font-size:15px;transition:all .3s ease;}
                        #mobile-header .searchform-wrapper .searchform input[type=text]:hover{background-color:#ffffffc2;}
                        #mobile-header .searchform-wrapper .searchform input[type=text]:focus{outline:none;background-color:#fff;box-shadow:0 1px 7px rgba(0, 0, 0, 0.25);}
                        #mobile-header .searchform-wrapper .searchform input[type=text]::placeholder{color:var(--wp--preset--color--text);font-size:15px;}
                        #mobile-header .searchform-wrapper .searchform input[type=text]:focus::placeholder{color:var(--wp--preset--color--attenuated);}
            }

            @media(min-width:768px){
                :root{
                    /* media queries */
                    --breakpoint:min(100% - 30px, 690px);
                    --breakpoint-without-padding:min(100%, 690px);

                    /* pie de página */
                    --text-align--footer:left;
                    --grid-footer--widgets:1fr 1fr;
                    --margin-bottom--h2--footer:22px;
                    --font-size--xx--h2--footer:20px;
                    --margin-bottom--xx--h2--footer:22px;
                    --justify-content--li--footer:flex-start;
                    --justify-content--social--footer:flex-start;
                    --margin-bottom--payments--footer:0;

                    /* frontpage */
                        /* hero */
                        --font-size-title-slide:30px;
                        --line-height-title-slide:1.1;
                        --margin-bottom-title-slide:15px;
                        --text-align--slide-content:left;
                        --padding--slide:26px 50px 50px;
                        --margin-top--slide-button:40px;
                        --slideshow-buttons-size:10px;
                        /* catalog */
                        --height-catalog:170px;
                        /* map */
                        --height-map--contact:440px;
                    
                    /* tienda */
                    --grid-template-columns--lists:repeat(auto-fill, minmax(207px, 1fr));
                    --gap--lists:16px 12px;

                    /* separations */
                    --margin-bottom--post:50px;

                    /* página */
                    --height-header:460px;
                    --content-upload:-380px;
                    --margin-bottom--title:60px;
                    --font-size--titles-page:36px;
                    --padding-content--page:45px 35px 60px;
                    --margin-bottom--post:50px;
                    --margin-bottom-post-thumbnail--single:30px;
                    --margin-blockquote:54px 0 45px;
                    --margin-lists--single:27.2px 0;

                    /* error 404 */
                    --font-size-title--error404:60px;
                    --line-height-title--error404:1.5;
                    --padding-title--error404:40px 0 20px;

                    /* blog */
                    --separation-posts:70px 30px;
                    --gap--posts-wrapper:30px;
                    --grid-template-columns--posts:1fr 1fr;
                }

                /* pie de página */
                    /* dirección */
                    .footer-widgets address li:nth-child(5){margin-left:24px;}
                    .footer-widgets address li:nth-child(7),
                    .footer-widgets address li:nth-child(8){margin-left:24px;}
                    /* copyright */
                    #main-footer .copyright{display:flex;flex-direction:row-reverse;height:54px;padding:0;align-items:center;justify-content:space-between;}

                /* frontpage */
                    /* hero */
                    .slideshow-wrapper .slideshow .slide .content .title{text-align:left;}
                    .slideshow-wrapper .slideshow .slide .content{align-self:end;max-width:64%;}
                    /* recien llegados */
                    #main .container .arrivals.slideshow.section .slideshow-products--wrapper .woocommerce .products{width:300%;}
            }

            @media screen and (min-width: 0px) and (max-width: 991px){
                #desktop-header,
                #desktop-main-header{display:none;}
            }

            @media screen and (min-width: 768px) and (max-width: 1023px){
                #main .container .featured-products.slideshow.section .slideshow-products--wrapper .woocommerce .products li:nth-child(n+4):before{box-shadow:inset 0 0 0 1px #fff;}
                /* frontpage */
                    /* más vendidos */
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1){grid-column:span 3;}
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1) .products-list__item{grid-template-columns:168px 1fr;grid-template-rows:1fr;}
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1) .products-list__item .woocommerce-LoopProduct-link.woocommerce-loop-product__link{grid-row:1/4;}
            }

            @media(min-width:992px){
                :root{
                    /* media queries */
                    --breakpoint:min(100% - 30px, 930px);
                    --breakpoint-without-padding:min(100%, 930px);
                    --grid-columns--middle-bar:225px 475px 1fr;
                    --grid-columns--bottom-bar:220px 1fr auto;
                    --width-attachments:46.75px;
                    --height-attachments:42px;

                    /* pie de página */
                    --grid-footer--widgets:1fr 1fr 1fr;
                    --grid-column--newsletter--footer:inherit;

                    /* frontpage */
                        /* hero */
                        --grid-columns--hero:220px 1fr;
                        /* map */
                        --height-map--contact:50px;
                    
                    /* tienda */
                        /* sidebar */
                        --display--sidebar--woocommerce:inherit;
                        
                    /* página */
                    --height-header:500px;
                    --padding-content--page:76px 110px 110px;
                    --margin-bottom-post-thumbnail--single:40px;
                    --margin-h2--single:56px 0 26px;
                    --margin-h3--single:35px 14px;

                    /* error 404 */
                    --font-size-title--error404:80px;
                    --margin-bottom-content--error404:70px;

                    /* blog */
                    --gap--posts-wrapper:36px 50px;
                    --grid-template-columns--posts-wrapper:1fr 284px;

                }
                #mobile-header{display:none;}

                /* frontpage */
                    /* hero */
                    .hero-section{display:grid; grid-template-columns:var(--grid-columns--hero);gap:15px;}
                    .hero-section .slideshow-wrapper{grid-column:2/3;}
                    .slideshow-wrapper .slideshow .slide .content{max-width:73%;}
                    .slideshow-wrapper .slideshow .slide .content button{height:46px;font-size:20px;}
                    /* más vendidos */
                    #main .container .best-selling.section .woocommerce .products{grid-template-columns:1.8fr 1fr 1fr 1fr;}
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1){grid-column:span 1;grid-row:span 2;}
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1) .products-list__item{grid-template-rows:auto 1fr;}
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1) .products-list__item .product-card__info .title-wrapper.product-permalink .woocommerce-loop-product__title{font-size:17px;margin-bottom:15px;}
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1) .products-list__item .price{font-size:20px;}
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1) .products-list__item .product-card__buttons :is(.button.product_type_simple.add_to_cart_button.ajax_add_to_cart,.button.button.product_type_variable.add_to_cart_button,.button.product_type_simple){
                        font-size:1.125rem;
                        height:calc(2.75rem + 2px);
                        padding:.8125rem 2rem;
                        line-height:1;
                    }
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1) .products-list__item .product-card__buttons .yith-wcwl-add-button,
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1) .products-list__item .product-card__buttons .yith-wcwl-add-to-wishlist .feedback{width:38px;}
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1) .products-list__item .product-card__buttons{max-height:300px;width:100%!important;left:0!important;position:relative;padding-bottom:var(--top--onsale);align-self:end;padding-left:0;border:none!important;z-index:inherit;}
                    #main .container .best-selling.section .woocommerce .products .product:nth-child(1):hover .products-list__item .product-card__buttons{bottom:0;padding:0 18px 18px 0;border:none!important;}
                    /* recien llegados */
                    #main .container .arrivals.slideshow.section .slideshow-products--wrapper .woocommerce .products{width:200%;}
            }

            @media screen and (min-width: 992px) and (max-width: 1199px){
                .feature-cell{grid-template-columns:1fr;text-align:center;}
                .feature-cell > a{grid-template-columns:1fr;}
                .feature-cell svg{grid-column:inherit;grid-row:inherit;margin-inline:auto;}
                .feature-cell h2{grid-column:inherit;grid-row:inherit;}
                .feature-cell p{grid-column:inherit;grid-row:inherit;}
            }

            @media(min-width:1199px){
                :root{
                    /* media queries */
                    --breakpoint:min(100% - 30px, 1110px);
                    --breakpoint-without-padding:min(100% -30px, 1110px);
                    --grid-columns--middle-bar:270px 603.4px 1fr;
                    --grid-columns--bottom-bar:255px 1fr auto;
                    --width-attachments:50.75px;
                    --position--counter:5px;

                    /* frontpage */
                        /* hero */
                        --grid-columns--hero:255px 1fr;
                        --margin-top--slide-button:47px;
                        --slideshow-buttons-size:11px;
                        /* map */
                        --height-map--contact:540px;

                    /* separations */
                    --top--onsale:18px;
                    
                    /* blog */
                    --gap--posts-wrapper:50px 50px;
                    --grid-template-columns--posts-wrapper:1fr 330px;

                    /* página */
                    --max-width--content-upload:980px;

                    /* shop */
                        /* lists */
                        --padding--link-to-product:18px 18px 20px;
                        --padding--product-card-info:0 18px;
                        --padding--product-card__buttons:0 18px 18px 18px;
                        <?php
                            $ofertas = wc_get_product_ids_on_sale(); 
                            if (empty($ofertas)) : 
                                echo '--grid-template-columns--products:repeat(2, 1fr)';
                            else : 
                                echo '--grid-template-columns--products:repeat(3, 1fr)';
                            endif;
                        ?>
                }
                .footer-widgets .menus{flex:2 0 140px;}
                #products{display:inherit;}
            }

            @media(min-width:1366px){
                :root{
                    /* shop */
                        /* lists */
                        --padding--product-card__buttons:0 18px 0 18px;
                        --position--product-card__buttons:absolute;
                        --max-height--product-card__buttons:0;
                }
                /* frontpage */
                    /* productos destacados */
                    #main .container .featured-products.slideshow.section .slideshow-products--wrapper .woocommerce .products{margin-bottom:66px;}

                /* tienda */
                ul.products li{border:1px solid #ededed;}
                ul.products li:hover{border:1px solid var(--wp--preset--color--primary-color-emphasis);}
                ul.products li:hover .products-list__item{border:1px solid var(--wp--preset--color--primary-color-emphasis);}
                ul.products li:before{content:none;box-shadow:none!important;}
                ul.products li:hover:before{content:none;}
                ul.products li .product-card__buttons{bottom:0;z-index:4;width:calc(100% + 2px)!important;left:-1px;border-right:2px solid var(--wp--preset--color--primary-color-emphasis);border-left:2px solid var(--wp--preset--color--primary-color-emphasis);padding:0 18px;background:#fff;}
                ul.products li:hover .product-card__buttons{bottom:-61px;max-height:300px;padding:18px 18px 18px 18px;border-bottom:2px solid var(--wp--preset--color--primary-color-emphasis);}
            }
        </style>
    <?php
}
add_action('wp_head', 'stroyka_theme_custom_breakpoints');