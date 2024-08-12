document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        function onloadSlideshowFeaturedProducts(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const script = document.createElement('script');
                    script.src = './wp-content/themes/stroyka/assets/js/featured-products-slideshow.js';
                    document.body.appendChild(script);
                    observer.unobserve(entry.target);
                }
            });
        }

        const observerSlideshowFeaturedProducts = new IntersectionObserver(onloadSlideshowFeaturedProducts, {
            root: null,
            rootMargin: '0px',
            threshold: 0
        });

        const slideshowFeaturedProducts = document.querySelector('.slideshow-products--wrapper .woocommerce .products');

        observerSlideshowFeaturedProducts.observe(slideshowFeaturedProducts);
    }, 0);

});

document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        function onloadSlideshowArrivals(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const script = document.createElement('script');
                    script.src = './wp-content/themes/stroyka/assets/js/arrivals-slideshow.js';
                    document.body.appendChild(script);
                    observer.unobserve(entry.target);
                }
            });
        }

        const observerSlideshowArrivals = new IntersectionObserver(onloadSlideshowArrivals, {
            root: null,
            rootMargin: '0px',
            threshold: 0
        });

        const slideshowArrivals = document.querySelector('#main .container .arrivals.slideshow.section .slideshow-products--wrapper .woocommerce .products');

        observerSlideshowArrivals.observe(slideshowArrivals);
    }, 300);

});

document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        function onloadSlideshowOnsale(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const script = document.createElement('script');
                    script.src = './wp-content/themes/stroyka/assets/js/onsale-slideshow.js';
                    document.body.appendChild(script);
                    observer.unobserve(entry.target);
                }
            });
        }

        const observerSlideshowArrivals = new IntersectionObserver(onloadSlideshowOnsale, {
            root: null,
            rootMargin: '0px',
            threshold: 0
        });

        const slideshowArrivals = document.querySelector('#main .container .sale-products.slideshow.section .slideshow-products--wrapper .woocommerce .products');

        observerSlideshowArrivals.observe(slideshowArrivals);
    }, 300);

});

document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        function onloadSlideshowBlog(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const script = document.createElement('script');
                    script.src = './wp-content/themes/stroyka/assets/js/blog-slideshow.js';
                    document.body.appendChild(script);
                    observer.unobserve(entry.target);
                }
            });
        }

        const observerSlideshowBlog = new IntersectionObserver(onloadSlideshowBlog, {
            root: null,
            rootMargin: '0px',
            threshold: 0
        });

        const slideshowBlog = document.querySelector('#main .container .blog.slideshow.section .posts');

        observerSlideshowBlog.observe(slideshowBlog);
    }, 300);

});