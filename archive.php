<?php
get_header();

    echo '
    <main id="main">
        <div class="container main-content">

            <section class="section content-header">
                <div class="breadcrumbs">'; get_breadcrumb(); echo '</div>
                <div class="title-wrapper">';
                    the_archive_title( '<h1>', '</h1>' );
                echo '
                </div>
            </section>
            
            <section class="section posts-wrapper">';
                  
                if ( have_posts() ){           
                    echo '
                    <div class="posts">';
                        

                        while( have_posts() ){            
                            the_post();  
                            get_template_part( 'templates/content', 'archive' );    
                        }

                        echo '
                        <div class="navigation pagination">
                            <div class="nav-links">';
                            global $wp_query;

                            // Obtiene el total de páginas
                            $total_pages = $wp_query->max_num_pages;
                            
                            // Verifica si hay más de una página
                            if ($total_pages > 1) {
                                // Obtiene la página actual
                                $current_page = max(1, get_query_var('paged'));
                            
                                // Muestra el botón de retroceso solo en la primera página
                                if ($current_page === 1) {
                                    echo '
                                    <a class="prev page-numbers disabled" href="#">
                                        <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px">
                                            <use xlink:href="'.get_template_directory_uri().'/assets/img/sprite.svg#arrow-rounded-left-8x13"></use>
                                        </svg>
                                    </a>';
                                }
                            
                                custom_pagination();
                            
                                // Muestra el botón de avance solo en la última página
                                if ($current_page === $total_pages) {
                                    echo '
                                    <a class="next page-numbers disabled" href="#">
                                        <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
                                            <use xlink:href="'.get_template_directory_uri().'/assets/img/sprite.svg#arrow-rounded-right-8x13"></use>
                                        </svg>
                                    </a>';
                                }
                            }
                            
                            echo '
                            </div>
                        </div>
                    </div>';     
                } else {
                    echo '<p>' . esc_html__('No se encontró ninguna coincidencia', 'pinplast') . '</p>';
                }

                $post_count = wp_count_posts();
                if ( $post_count->publish > 0 ) :
                    include(TEMPLATEPATH . '/parts/sidebars/blog.php');
                endif;

            echo '
            </section>
        </div>
    </main>';

get_footer();