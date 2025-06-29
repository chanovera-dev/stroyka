function initTopSubmenusToggle() {
    const menus = document.querySelectorAll(".top-header .menu");
  
    function closeOtherMenus(currentItem = null) {
      document.querySelectorAll(".top-header .menu .menu-item-has-children--opened").forEach(item => {
        if (item !== currentItem) {
          item.classList.remove("menu-item-has-children--opened");
          const submenu = item.querySelector(".sub-menu");
          if (submenu) {
            submenu.style.maxHeight = "0px";
            submenu.style.transitionDuration = "0.3s";
          }
        }
      });
    }
  
    menus.forEach(menu => {
      const buttons = menu.querySelectorAll(".button-for-submenu");
  
      buttons.forEach(button => {
        button.addEventListener("click", event => {
          event.stopPropagation();
  
          const parentItem = button.closest(".menu-item-has-children");
          if (!parentItem) return;
  
          const submenu = parentItem.querySelector(".sub-menu");
          if (!submenu) return;
  
          const isOpen = parentItem.classList.contains("menu-item-has-children--opened");
  
          closeOtherMenus(parentItem);
  
          if (!isOpen) {
            parentItem.classList.add("menu-item-has-children--opened");
  
            const itemsCount = submenu.children.length;
            const duration = 0.1 * itemsCount;
            submenu.style.transitionDuration = `${duration}s`;
            submenu.style.maxHeight = submenu.scrollHeight + "px";
          } else {
            parentItem.classList.remove("menu-item-has-children--opened");
            submenu.style.transitionDuration = "0.3s";
            submenu.style.maxHeight = "0px";
          }
        });
      });
    });
  
    // Cierra todos los submenús al hacer clic fuera
    document.addEventListener("click", () => {
      closeOtherMenus();
    });
  
    // Cierra todos los submenús al hacer scroll
    window.addEventListener("scroll", () => {
      closeOtherMenus();
    });
  }
  document.addEventListener("DOMContentLoaded", initTopSubmenusToggle);