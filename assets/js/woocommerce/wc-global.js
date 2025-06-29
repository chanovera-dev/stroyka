const searchform = document.querySelector('.mobile-header .mobile-header-content .woocommerce-search--wrapper');
const openButton = document.getElementById('open-search-mobile__button');

function openWooCommerceSearchform() {
    if (!searchform) return;
    searchform.style.transition = "transform .3s ease-in-out";
    searchform.classList.add('woocommerce-search--wrapper--open');
}

function closeWooCommerceSearchform() {
    if (!searchform) return;
    searchform.classList.remove('woocommerce-search--wrapper--open');
}

document.addEventListener('click', function (event) {
    if (!searchform || !openButton) return;

    const clickedInsideSearch = searchform.contains(event.target);
    const clickedOpenButton = openButton.contains(event.target);

    if (!clickedInsideSearch && !clickedOpenButton) {
        closeWooCommerceSearchform();
    }
});

function menuCategories() {
    const body = document.body;
    const isHome = body.classList.contains('home');
    const departmentsButton = document.getElementById('departments-button');
    const chevronDepartmentsButton = document.querySelector('.departments__button-arrow');
    const categoriesList = document.getElementById('categories-list');

    if (!departmentsButton || !chevronDepartmentsButton || !categoriesList) return;

    categoriesList.style.display = "inherit";

    if (isHome && window.scrollY === 0) {
        categoriesList.classList.add('open');
        chevronDepartmentsButton.classList.add('rotate');
        departmentsButton.disabled = true;
        setTimeout(() => {
            categoriesList.style.transition = "max-height .3s ease-in-out, padding .3s ease-in-out";
            chevronDepartmentsButton.style.transition = "transform .3s ease-in-out";
        }, 1000);
    }

    departmentsButton.addEventListener('click', function (e) {
        e.stopPropagation(); // Prevenir que el clic se propague al documento
        chevronDepartmentsButton.style.transition = "transform .3s ease-in-out";
        categoriesList.style.transition = "max-height .3s ease-in-out, padding .3s ease-in-out";
        categoriesList.classList.toggle('open');
        chevronDepartmentsButton.classList.toggle('rotate');
    });

    document.addEventListener('click', function (e) {
        const isClickInside = categoriesList.contains(e.target) || departmentsButton.contains(e.target);
        if (!isClickInside && categoriesList.classList.contains('open') && !(isHome && window.scrollY === 0)) {
            categoriesList.classList.remove('open');
            chevronDepartmentsButton.classList.remove('rotate');
            departmentsButton.disabled = false;
        }
    });

    window.addEventListener("scroll", () => {
        if (categoriesList.classList.contains('open') && window.scrollY > 0) {
            categoriesList.classList.remove('open');
            chevronDepartmentsButton.classList.remove('rotate');
            departmentsButton.disabled = false;
        } else if (isHome && window.scrollY === 0) {
            categoriesList.classList.add('open');
            chevronDepartmentsButton.classList.add('rotate');
            departmentsButton.disabled = true;
        }
    });
}
document.addEventListener('DOMContentLoaded', menuCategories);

console.log('woocommerce global js loaded');