<?php

function custom_replace_filter_headings() { // Replace the filter price/attribute title for a button
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterWrappers = document.querySelectorAll('[data-filter-type="price-filter"], [data-filter-type="attribute-filter"]');

            filterWrappers.forEach(wrapper => {
                const heading = wrapper.querySelector('h3.wp-block-heading');
                if (heading) {
                    const button = document.createElement('button');
                    button.className = 'filter__title';
                    button.innerHTML = heading.textContent + `
                        <svg class="filter__arrow" width="12px" height="7px">
                            <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/sprite.svg#arrow-rounded-down-12x7"></use>
                        </svg>`;
                    heading.replaceWith(button);
                }
            });
        });
    </script>
    <?php
}
add_action('wp_footer', 'custom_replace_filter_headings');