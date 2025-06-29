const slideshowSales = document.querySelector('.site-main .block .content.sales.slideshow-products--wrapper .woocommerce .products');
let slideSales = document.querySelectorAll('.site-main .block .content.sales.slideshow-products--wrapper .woocommerce .products .product');

function nextSales() {
  let firstSlideSales = document.querySelectorAll('.site-main .block .content.sales.slideshow-products--wrapper .woocommerce .products .product')[0];
  let secondSlideSales = document.querySelectorAll('.site-main .block .content.sales.slideshow-products--wrapper .woocommerce .products .product')[1];
  slideshowSales.style.transition = "all .5s ease";
  slideshowSales.style.transform = "translateX(-16.6666%)";
  setTimeout(function() {
    slideshowSales.style.transition = "none";
    slideshowSales.insertAdjacentElement('beforeend', firstSlideSales);
    slideshowSales.insertAdjacentElement('beforeend', secondSlideSales);
    slideshowSales.style.transform = "translateX(0)";
  }, 500);
}

function prevSales() {
  let slideSales = document.querySelectorAll('.site-main .block .content.sales.slideshow-products--wrapper .woocommerce .products .product');
  let lastSlideSales = slideSales[slideSales.length - 1];
  let beforeLastSlideSales = slideSales[slideSales.length - 2];

  // Inserta los dos últimos productos al principio, sin animación
  slideshowSales.style.transition = "none";
  slideshowSales.insertAdjacentElement('afterbegin', lastSlideSales);
  slideshowSales.insertAdjacentElement('afterbegin', beforeLastSlideSales);

  // Mueve el contenedor a la izquierda sin transición para mostrar el nuevo contenido desplazado
  slideshowSales.style.transform = "translateX(-16.6666%)";

  // Forzar reflujo para que el navegador aplique el cambio anterior antes de iniciar la transición
  void slideshowSales.offsetWidth;

  // Ahora animamos de regreso a la posición normal
  slideshowSales.style.transition = "all .5s ease";
  slideshowSales.style.transform = "translateX(0)";
}

// Listeners de botones
document.querySelector('.backward-button-s')?.addEventListener('click', prevSales);
document.querySelector('.forward-button-s')?.addEventListener('click', nextSales);

// Soporte para dispositivos táctiles (swipe)
let startX = 0;
let endX = 0;

slideshowSales.addEventListener('touchstart', (e) => {
  startX = e.touches[0].clientX;
}, { passive: true });

slideshowSales.addEventListener('touchmove', (e) => {
  endX = e.touches[0].clientX;
}, { passive: true });

slideshowSales.addEventListener('touchend', () => {
  const deltaX = endX - startX;
  if (Math.abs(deltaX) > 50) { // Umbral para swipe intencional
    if (deltaX < 0) {
      nextSales(); // Swipe izquierda = siguiente
    } else {
      prevSales(); // Swipe derecha = anterior
    }
  }
  startX = 0;
  endX = 0;
});

console.log('Sales slideshow with swipe support ready');