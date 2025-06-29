<?php

/**
 * Reemplaza los encabezados de los filtros por botones
 */
function custom_replace_filter_headings_persistent() {
    $uri_sprite = get_template_directory_uri() . '/assets/img/sprite.svg';
    ?>
    <script>
        function replaceFilterHeadings() {
            const filterWrappers = document.querySelectorAll('[data-filter-type]');
            filterWrappers.forEach(wrapper => {
                const heading = wrapper.querySelector('h3.wp-block-heading');
                if (heading && !wrapper.querySelector('.filter__title')) {
                    const button = document.createElement('button');
                    button.className = 'filter__title';
                    button.innerHTML = heading.textContent + `
                        <svg class="filter__arrow" width="12px" height="7px">
                            <use href="<?= $uri_sprite ?>#arrow-rounded-down-12x7"></use>
                        </svg>`;
                    heading.replaceWith(button);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            replaceFilterHeadings();

            // Observador para mutaciones del DOM (React updates, AJAX, etc.)
            const observer = new MutationObserver(() => {
                replaceFilterHeadings();
            });

            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'custom_replace_filter_headings_persistent');