function openWooCommerceSearchform() {
    const searchform = document.querySelector('.mobile-header .mobile-header-content .woocommerce-search--wrapper');
    searchform.classList.add('woocommerce-search--wrapper--open');
}
  
function closeWooCommerceSearchform() {
    const searchform = document.querySelector('.mobile-header .mobile-header-content .woocommerce-search--wrapper');
    searchform.classList.remove('woocommerce-search--wrapper--open');
}

function menuCategories() {
    // Obtén referencias a los elementos por sus ID
    const body = document.body;
    const isHome = body.classList.contains('home');
    let departmentsButton = document.getElementById('departments-button');
    let chevronDepartmentsButton = document.querySelector('.departments__button-arrow');
    let categoriesList = document.getElementById('categories-list');

    if (isHome && window.scrollY == 0) {
        categoriesList.classList.add('open');
        chevronDepartmentsButton.classList.add('rotate');
        departmentsButton.disabled = true;
    }
    
    // Agrega un evento de clic al botón
    departmentsButton.addEventListener('click', function () {
        // Alternar la clase 'open' en el elemento con ID 'categories-list'
        categoriesList.classList.toggle('open');
        chevronDepartmentsButton.classList.toggle('rotate');
    });

    window.addEventListener("scroll", () => {
        if (categoriesList.classList.contains('open') && window.scrollY > 0) {
            categoriesList.classList.remove('open');
            chevronDepartmentsButton.classList.remove('rotate');
            departmentsButton.disabled = false;
        } else if (isHome && window.scrollY == 0) {
            categoriesList.classList.toggle('open');
            chevronDepartmentsButton.classList.toggle('rotate');
            departmentsButton.disabled = true;
        }
    });
}
document.addEventListener('DOMContentLoaded', menuCategories);
