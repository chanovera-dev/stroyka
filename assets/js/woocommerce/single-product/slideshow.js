document.addEventListener('DOMContentLoaded', function () {
  // Crear los contenedores
  const productList = document.querySelector('.related.products .products.columns-1');

  if (productList) {
    const slideshowWrapper = document.createElement('div');
    slideshowWrapper.className = 'slideshow-products--wrapper';

    const woocommerceDiv = document.createElement('div');
    woocommerceDiv.className = 'woocommerce';

    productList.parentNode.insertBefore(slideshowWrapper, productList);
    slideshowWrapper.appendChild(woocommerceDiv);
    woocommerceDiv.appendChild(productList);
  }

  setTimeout(() => {
    const slideshow = document.querySelector('.slideshow-products--wrapper .woocommerce .products');
    if (!slideshow) return;

    function prev() {
      const firstSlide = slideshow.querySelector('.product');
      slideshow.style.transition = 'all .5s ease-in-out';
      slideshow.style.transform = 'translateX(-12.5%)';

      setTimeout(() => {
        slideshow.style.transition = 'none';
        slideshow.appendChild(firstSlide);
        slideshow.style.transform = 'translateX(0)';
      }, 500);
    }

    function next() {
      const slides = slideshow.querySelectorAll('.product');
      const lastSlide = slides[slides.length - 1];
      slideshow.style.transition = 'none';
      slideshow.insertBefore(lastSlide, slideshow.firstChild);
      slideshow.style.transform = 'translateX(-12.5%)';

      void slideshow.offsetWidth;

      slideshow.style.transition = 'all .5s ease-in-out';
      slideshow.style.transform = 'translateX(0)';
    }

    // Botones
    document.querySelector('.backward-button')?.addEventListener('click', next);
    document.querySelector('.forward-button')?.addEventListener('click', prev);

    // Soporte para dispositivos táctiles
    let startX = 0;
    let endX = 0;

    slideshow.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
    }, { passive: true });

    slideshow.addEventListener('touchmove', (e) => {
      endX = e.touches[0].clientX;
    }, { passive: true });

    slideshow.addEventListener('touchend', () => {
      const deltaX = endX - startX;
      if (Math.abs(deltaX) > 50) {
        if (deltaX < 0) {
          prev(); // Swipe izquierda: siguiente
        } else {
          next(); // Swipe derecha: anterior
        }
      }
      startX = 0;
      endX = 0;
    });

    console.log('slideshow ready with swipe support');
  }, 1000);
});