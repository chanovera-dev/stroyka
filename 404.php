<?php
    get_header();

    echo '
    <main id="main">
        <div class="container main-content">
            <article class="section content-section">
                <h1>'.esc_html__('¡Oops! Error 404', 'pinplast').'</h1>
                <h2>'.esc_html__('Página no encontrada', 'pinplast').'</h2>
                <p>'.esc_html__('No encontramos la página que busca.', 'pinplast').'</p>
                <p>'.esc_html__('Intente utilizar la búsqueda.', 'pinplast').'</p>
                <form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '">
                    <label>
                    <span class="screen-reader-text">' . _x( 'Buscar por:', 'label' ) . '</span>
                        <input type="search" class="search-field" placeholder="' . esc_attr_x( 'Buscar consulta...', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Buscar por:', 'label' ) . '" />
                    </label>
                    <input type="submit" class="search-submit" value="' . esc_attr_x( 'Buscar', 'submit button' ) . '" />
                </form>
                <p>'.esc_html__('O vaya a inicio para empezar de nuevo.', 'pinplast').'</p>
                <a class="btn btn-secondary btn-sm" href="' . get_home_url() . '">'.esc_html('Ir a la página de inicio', 'pinplast').'</a>';
            echo '
            </article>
        </div>
    </main>';

    get_footer();