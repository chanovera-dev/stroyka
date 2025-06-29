document.addEventListener('DOMContentLoaded', function() {
  svg4everybody()
})

const body = document.body;
const menuMobile = document.querySelector('.menu-mobile');
const backdrop = document.querySelector('.menu-mobile__backdrop');

function scrollActions() {
    const SCROLL_UP = "scroll-up";
    const SCROLL_DOWN = "scroll-down";
    let lastScroll = 0;

    window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset;

        if (currentScroll <= 0) {
            body.classList.remove(SCROLL_UP, SCROLL_DOWN);
            return;
        }

        const isScrollingDown = currentScroll > lastScroll;

        body.classList.toggle(SCROLL_DOWN, isScrollingDown);
        body.classList.toggle(SCROLL_UP, !isScrollingDown);

        lastScroll = currentScroll;
    });
}
scrollActions();

function openMenuMobile() {
  body.style.overflow = "hidden";
  menuMobile.classList.add('menu-mobile--open');
  backdrop.classList.add('menu-mobile__backdrop--open');
  backdrop.style.transform = 'translateX(0)';
  backdrop.style.transition = 'background-color .3s ease-in-out, transform 0s ease-in-out';
}

function closeMenuMobile() {
  body.style.overflow = "inherit";
  menuMobile.classList.remove('menu-mobile--open');
  backdrop.classList.remove('menu-mobile__backdrop--open');
  backdrop.style.transition = 'background-color .3s ease-in-out, transform 0s ease-in-out';
  setTimeout(() => {
    backdrop.style.transform = 'translateX(-100%)';
  }, 300); 
}

document.addEventListener("click", function(event) {
  if (event.target && event.target.id === 'menu-mobile__backdrop') {
    closeMenuMobile()
    if (typeof closeWooCommerceSidebar === "function") {
      closeWooCommerceSidebar()
    }
  }
})

document.addEventListener("keydown", function (event) {
  if (event.key === "Escape" || event.key === "Esc") {
    if (typeof closeMenuMobile === "function") {
      closeMenuMobile();
    }
    if (typeof closeWooCommerceSidebar === "function") {
      closeWooCommerceSidebar();
    }
    if (typeof closeWooCommerceSearchform === "function") {
      closeWooCommerceSearchform();
    }
  }
});

function initMobileSubMenusToggle() {
  document.querySelectorAll(".menu-mobile--wrapper .mobile--list .button-for-submenu").forEach(button => {
    button.addEventListener("click", () => {
      const menuItem = button.closest("li");
      const subMenu = menuItem?.querySelector(".sub-menu");
      if (!subMenu) return;

      const isOpen = subMenu.classList.contains("open");
      const itemCount = subMenu.childElementCount;
      const duration = (isOpen ? 0.2 : 0.35) * itemCount;

      subMenu.style.transition = `max-height ${duration}s ease, opacity ${duration}s ease`;
      subMenu.classList.toggle("open");
      button.classList.toggle("active");
      button.classList.toggle("rotate");
    });
  });
}
document.addEventListener("DOMContentLoaded", initMobileSubMenusToggle);

console.log('global js loaded')