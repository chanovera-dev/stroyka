const slideshowOnsale = document.querySelector('#main .container .sale-products.slideshow.section .slideshow-products--wrapper .woocommerce .products');
let slideOnsale = document.querySelectorAll('#main .container .sale-products.slideshow.section .slideshow-products--wrapper .woocommerce .products li');

function nextOnsale() {
  let firstSlideOnsale = document.querySelectorAll('#main .container .sale-products.slideshow.section .slideshow-products--wrapper .woocommerce .products li')[0];
  slideshowOnsale.style.transition = "all .5s ease";
  slideshowOnsale.style.transform = "translateX(-12.5%)";
  setTimeout(function() {
    slideshowOnsale.style.transition = "none";
    slideshowOnsale.insertAdjacentElement('beforeend', firstSlideOnsale);
    slideshowOnsale.style.transform = "translateX(0)";
  }, 500);
}

function prevOnsale() {
  let slideOnsale = document.querySelectorAll('#main .container .sale-products.slideshow.section .slideshow-products--wrapper .woocommerce .products li');
  let lastSlideOnsale = slideOnsale[slideOnsale.length -1];
  slideshowOnsale.style.transform = "translateX(12.5%)";
  slideshowOnsale.style.transition = "all .5s ease";
  setTimeout(function() {
    slideshowOnsale.style.transition = "none";
    slideshowOnsale.insertAdjacentElement('afterbegin', lastSlideOnsale);
    slideshowOnsale.style.transform = "translateX(0)";
  }, 500);
}