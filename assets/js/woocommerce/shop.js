function openWooCommerceSidebar() {
    const menu = document.querySelector('.mobile-woo-sidebar');
  const backdrop = document.querySelector('.menu-mobile__backdrop');
  const body = document.body;

  body.style.overflow = "hidden";
  menu.classList.add('mobile-woo-sidebar--open');
  menu.style.transition = "transform .3s ease-in-out";
  backdrop.classList.add('menu-mobile__backdrop--open');
  backdrop.style.transform = 'translateY(0)';
  backdrop.style.transition = 'background-color .3s ease-in-out, transform 0s ease-in-out';
}

function closeWooCommerceSidebar() {
    const menu = document.querySelector('.mobile-woo-sidebar');
    const backdrop = document.querySelector('.menu-mobile__backdrop');
    const body = document.body;

    body.style.overflow = "inherit";
    menu.classList.remove('mobile-woo-sidebar--open');
    backdrop.classList.remove('menu-mobile__backdrop--open');
    backdrop.style.transition = 'background-color .3s ease-in-out, transform 0s ease-in-out';
    setTimeout(() => {
    backdrop.style.transform = 'translateY(-100%)';
    }, 300); 
}

function setupFilterToggleWidgets() {
    const buttons = document.querySelectorAll(".widget_filter_title_widget .filter__title");
  
    buttons.forEach(button => {
        const widgetContainer = button.closest(".widget_filter_title_widget");
        const parentGroup = widgetContainer.parentElement;

        const ul = parentGroup.querySelector("ul.wc-block-product-categories-list");
        if (!ul) return;

        const itemCount = ul.querySelectorAll(":scope > li").length;
        const openTime = itemCount * 0.05;
        const closeTime = itemCount * 0.025;

        ul.style.overflow = "hidden";
        ul.style.maxHeight = ul.scrollHeight + "px";
        ul.style.transition = `max-height ${openTime}s ease`;
        ul.classList.add("is-open");
        let isOpen = true;

        button.addEventListener("click", function () {
            if (isOpen) {
                ul.style.transition = `max-height ${closeTime}s ease`;
                ul.style.maxHeight = "0";
                ul.classList.remove("is-open");
                button.classList.add("arrow_rotate");
                isOpen = false;
            } else {
                ul.style.transition = `max-height ${openTime}s ease`;
                ul.style.maxHeight = ul.scrollHeight + "px";
                ul.classList.add("is-open");
                button.classList.remove("arrow_rotate");
                isOpen = true;
            }
        });

            window.addEventListener("resize", () => {
            if (isOpen) {
                ul.style.maxHeight = ul.scrollHeight + "px";
            }
        });
    });
}
document.addEventListener("DOMContentLoaded", setupFilterToggleWidgets);
  
function setupPriceFilterToggles() {
    const wrappers = document.querySelectorAll('.wc-blocks-filter-wrapper');

    wrappers.forEach(wrapper => {
        const button = wrapper.querySelector('.filter__title');
        const content = wrapper.querySelector('.wp-block-woocommerce-price-filter');

        if (!button || !content) return;

        // Estado inicial: abierto
        content.style.maxHeight = "400px";
        content.style.overflow = "hidden";
        content.style.transition = "max-height 0.5s ease-in-out";
        let isOpen = true;

        button.addEventListener('click', () => {
            if (isOpen) {
                content.style.maxHeight = "0px";
                button.classList.add('arrow_rotate');
            } else {
                content.style.maxHeight = "400px";
                button.classList.remove('arrow_rotate');
            }
            isOpen = !isOpen;
        });

        window.addEventListener('resize', () => {
            if (isOpen) {
                content.style.maxHeight = "400px";
            }
        });
    });
}
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(setupPriceFilterToggles, 3000);
});

function setupAttributeFilterToggle() {
    const buttons = document.querySelectorAll(".filter__title");

    buttons.forEach(button => {
        const filterWrapper = button.closest(".wp-block-woocommerce-filter-wrapper");
        if (!filterWrapper) return;

        const ul = filterWrapper.querySelector("ul.wc-block-attribute-filter-list");
        if (!ul) return;

        const itemCount = ul.querySelectorAll(":scope > li").length;
        const openTime = itemCount * 0.1;   // apertura más lenta
        const closeTime = itemCount * 0.05; // cierre más rápida

        // Estilo inicial
        ul.style.overflow = "hidden";
        ul.style.paddingTop = "5px";
        ul.style.maxHeight = ul.scrollHeight + "px";
        ul.style.transition = `max-height ${openTime}s ease, padding-top .3s ease`;
        ul.classList.add("is-open");

        let isOpen = true;

        button.addEventListener("click", function () {
            if (isOpen) {
                ul.style.transition = `max-height ${closeTime}s ease, padding-top .3s ease`;
                ul.style.paddingTop = "0px";
                ul.style.maxHeight = "0";
                ul.classList.remove("is-open");
                button.classList.add("arrow_rotate");
                isOpen = false;
            } else {
                ul.style.transition = `max-height ${openTime}s ease, padding-top .3s ease`;
                ul.style.paddingTop = "5px";
                ul.style.maxHeight = ul.scrollHeight + "px";
                ul.classList.add("is-open");
                button.classList.remove("arrow_rotate");
                isOpen = true;
            }
        });

        // Recalcular al hacer resize
        window.addEventListener("resize", () => {
            if (isOpen) {
                ul.style.maxHeight = ul.scrollHeight + "px";
            }
        });
    });
}
document.addEventListener("DOMContentLoaded", function () {
    setTimeout(setupAttributeFilterToggle, 1000);
});

function setupLayoutSwitcher() {
    const switcher = document.querySelector('.layout-switcher__list');
    const productsContainer = document.querySelector('#main .block .content .products');
  
    if (!switcher || !productsContainer) return;
  
    const buttons = switcher.querySelectorAll('.layout-switcher__button');
  
    // Activar el primer botón por defecto
    buttons.forEach(btn => btn.classList.remove('active'));
    if (buttons[0]) buttons[0].classList.add('active');
  
    buttons.forEach((button, index) => {
      button.addEventListener('click', () => {
        // Quitar clase active de todos los botones
        buttons.forEach(btn => btn.classList.remove('active'));
        // Agregar clase active al botón actual
        button.classList.add('active');
  
        // Resetear clases del contenedor
        productsContainer.classList.remove('features-list__active', 'data-layout__list');
  
        // Aplicar clases según el botón
        if (index === 1) {
          productsContainer.classList.add('features-list__active');
        } else if (index === 2) {
          productsContainer.classList.add('data-layout__list');
        }
      });
    });
  }
  document.addEventListener('DOMContentLoaded', setupLayoutSwitcher);