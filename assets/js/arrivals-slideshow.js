const slideshowArrivals = document.querySelector('#main .container .arrivals.slideshow.section .slideshow-products--wrapper .woocommerce .products');
let slideArrivals = document.querySelectorAll('#main .container .arrivals.slideshow.section .slideshow-products--wrapper .woocommerce .products li');

function nextArrivals() {
  let firstSlideArrivals = document.querySelectorAll('#main .container .arrivals.slideshow.section .slideshow-products--wrapper .woocommerce .products li')[0];
  let secondSlideArrivals = document.querySelectorAll('#main .container .arrivals.slideshow.section .slideshow-products--wrapper .woocommerce .products li')[1];
  slideshowArrivals.style.transition = "all .5s ease";
  slideshowArrivals.style.transform = "translateX(-16.6666%)";
  setTimeout(function() {
    slideshowArrivals.style.transition = "none";
    slideshowArrivals.insertAdjacentElement('beforeend', firstSlideArrivals);
    slideshowArrivals.insertAdjacentElement('beforeend', secondSlideArrivals);
    slideshowArrivals.style.transform = "translateX(0)";
    
  }, 500);
}

function prevArrivals() {
  let slideArrivals = document.querySelectorAll('#main .container .arrivals.slideshow.section .slideshow-products--wrapper .woocommerce .products li');
  let lastSlideArrivals = slideArrivals[slideArrivals.length -1];
  let beforeLastSlideArrivals = slideArrivals[slideArrivals.length -2];
  slideshowArrivals.style.transform = "translateX(16.6666%)";
  slideshowArrivals.style.transition = "all .5s ease";
  setTimeout(function() {
    slideshowArrivals.style.transition = "none";
    slideshowArrivals.insertAdjacentElement('afterbegin', lastSlideArrivals);
    slideshowArrivals.insertAdjacentElement('afterbegin', beforeLastSlideArrivals);
    slideshowArrivals.style.transform = "translateX(0)";
  }, 500);
}