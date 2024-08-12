const slideshowFP = document.querySelector('.featured-products .slideshow-products--wrapper .woocommerce .products');
let slideFP = document.querySelectorAll('.featured-products .slideshow-products--wrapper .woocommerce .products li');

function nextFP() {
  let firstSlideFP = document.querySelectorAll('.featured-products .slideshow-products--wrapper .woocommerce .products li')[0];
  slideshowFP.style.transition = "all .5s ease";
  slideshowFP.style.transform = "translateX(-12.5%)";
  setTimeout(function() {
    slideshowFP.style.transition = "none";
    slideshowFP.insertAdjacentElement('beforeend', firstSlideFP);
    slideshowFP.style.transform = "translateX(0)";
  }, 500);
}

function prevFP() {
  let slideFP = document.querySelectorAll('.featured-products .slideshow-products--wrapper .woocommerce .products li');
  let lastSlideFP = slideFP[slideFP.length -1];
  slideshowFP.style.transform = "translateX(12.5%)";
  slideshowFP.style.transition = "all .5s ease";
  setTimeout(function() {
    slideshowFP.style.transition = "none";
    slideshowFP.insertAdjacentElement('afterbegin', lastSlideFP);
    slideshowFP.style.transform = "translateX(0)";
  }, 500);
}