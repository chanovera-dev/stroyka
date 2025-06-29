function initTopMenuBehavior() {
  const menuWrapper = document.querySelector(".block .content.top-header-content");
  const menu = document.querySelector(".top-header .menu");
  if (!menu) return;

  menuWrapper.style.opacity = "1";

  const firstWithSubmenu = menu.querySelector("li.menu-item-has-children");
  if (firstWithSubmenu) {
    firstWithSubmenu.style.marginLeft = "auto";
  }

  function closeOtherMenus(except = null) {
    document.querySelectorAll(".menu-item-has-children--opened").forEach(item => {
      if (item !== except) {
        item.classList.remove("menu-item-has-children--opened");
        const submenu = item.querySelector(".sub-menu");
        if (submenu) {
          submenu.style.maxHeight = "0px";
          submenu.style.transitionDuration = "0.3s";
        }
      }
    });
  }

  menu.querySelectorAll(".button-for-submenu").forEach(button => {
    button.addEventListener("click", e => {
      e.stopPropagation();

      const item = button.closest(".menu-item-has-children");
      const submenu = item?.querySelector(".sub-menu");
      if (!item || !submenu) return;

      const isOpen = item.classList.contains("menu-item-has-children--opened");
      closeOtherMenus(item);

      if (!isOpen) {
        item.classList.add("menu-item-has-children--opened");
        submenu.style.transitionDuration = `${submenu.children.length * 0.1}s`;
        submenu.style.maxHeight = submenu.scrollHeight + "px";
      } else {
        item.classList.remove("menu-item-has-children--opened");
        submenu.style.transitionDuration = "0.3s";
        submenu.style.maxHeight = "0px";
      }
    });
  });

  document.addEventListener("click", () => closeOtherMenus());
  window.addEventListener("scroll", () => closeOtherMenus());
}

document.addEventListener("DOMContentLoaded", initTopMenuBehavior);