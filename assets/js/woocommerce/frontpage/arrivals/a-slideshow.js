const slideshowArrivals = document.querySelector('.site-main .block .content.arrivals.slideshow-products--wrapper .woocommerce .products');
let slideArrivals = document.querySelectorAll('.site-main .block .content.arrivals.slideshow-products--wrapper .woocommerce .products .product');

function nextArrivals() {
  let firstSlideArrivals = document.querySelectorAll('.site-main .block .content.arrivals.slideshow-products--wrapper .woocommerce .products .product')[0];
  let secondSlideArrivals = document.querySelectorAll('.site-main .block .content.arrivals.slideshow-products--wrapper .woocommerce .products .product')[1];
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
  let slideArrivals = document.querySelectorAll('.site-main .block .content.arrivals.slideshow-products--wrapper .woocommerce .products .product');
  let lastSlideArrivals = slideArrivals[slideArrivals.length - 1];
  let beforeLastSlideArrivals = slideArrivals[slideArrivals.length - 2];

  slideshowArrivals.style.transition = "none";
  slideshowArrivals.insertAdjacentElement('afterbegin', lastSlideArrivals);
  slideshowArrivals.insertAdjacentElement('afterbegin', beforeLastSlideArrivals);
  slideshowArrivals.style.transform = "translateX(-16.6666%)";

  void slideshowArrivals.offsetWidth;

  slideshowArrivals.style.transition = "all .5s ease";
  slideshowArrivals.style.transform = "translateX(0)";
}

// Botones
document.querySelector('.backward-button-a')?.addEventListener('click', prevArrivals);
document.querySelector('.forward-button-a')?.addEventListener('click', nextArrivals);

// Soporte para dispositivos táctiles
let startX = 0;
let endX = 0;

slideshowArrivals.addEventListener('touchstart', (e) => {
  startX = e.touches[0].clientX;
}, { passive: true });

slideshowArrivals.addEventListener('touchmove', (e) => {
  endX = e.touches[0].clientX;
}, { passive: true });

slideshowArrivals.addEventListener('touchend', () => {
  let deltaX = endX - startX;
  if (Math.abs(deltaX) > 50) { // Umbral para evitar deslices pequeños
    if (deltaX < 0) {
      nextArrivals(); // Swipe hacia la izquierda
    } else {
      prevArrivals(); // Swipe hacia la derecha
    }
  }
  startX = 0;
  endX = 0;
});

console.log('Arrivals slideshow with swipe support ready');