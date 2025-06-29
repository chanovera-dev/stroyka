document.addEventListener("DOMContentLoaded", function () {
    const slideshow = document.querySelector("#slideshow");
    const slides = slideshow.querySelectorAll(".slide");
    const buttonsWrapper = document.querySelector(".slideshow-buttons");
    const totalSlides = slides.length;

    let currentSlide = 0;
    let animationFrame;

    // Ajustar anchos
    slideshow.style.width = `${100 * totalSlides}%`;
    slides.forEach(slide => {
        slide.style.width = `${100 / totalSlides}%`;
    });

    // Crear botones
    buttonsWrapper.innerHTML = "";
    slides.forEach((_, index) => {
        const button = document.createElement("li");
        button.classList.add("slideshow-button");
        if (index === 0) button.classList.add("active");
        button.dataset.index = index;
        buttonsWrapper.appendChild(button);
    });

    function animateSlide(from, to, duration = 300, targetIndex) {
        const startTime = performance.now();
        const distance = to - from;

        function animate(time) {
            const elapsed = time - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const current = from + distance * progress;
            slideshow.style.transform = `translateX(-${current}%)`;

            if (progress < 1) {
                animationFrame = requestAnimationFrame(animate);
            } else {
                cancelAnimationFrame(animationFrame);
                setActiveSlide(targetIndex); // Actualiza el slide activo al final
            }
        }

        cancelAnimationFrame(animationFrame);
        animationFrame = requestAnimationFrame(animate);
    }

    function setActiveSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle("active", i === index);
        });
    }

    function goToSlide(index) {
        if (index === currentSlide) return;

        const from = (100 / totalSlides) * currentSlide;
        const to = (100 / totalSlides) * index;
        const distance = Math.abs(index - currentSlide);

        const baseDuration = 300;
        const extraPerSlide = 300;
        const duration = baseDuration + (extraPerSlide * (distance - 1));

        animateSlide(from, to, duration, index);

        currentSlide = index;

        document.querySelectorAll(".slideshow-button").forEach((btn, i) => {
            btn.classList.toggle("active", i === index);
        });
    }

    buttonsWrapper.addEventListener("click", function (e) {
        if (e.target.classList.contains("slideshow-button")) {
            const index = parseInt(e.target.dataset.index);
            goToSlide(index);
        }
    });

    // Inicializar primer slide
    goToSlide(0);
    setActiveSlide(0);

    // Soporte para gestos táctiles
    let startX = 0;
    let endX = 0;
    const threshold = 50; // Mínimo desplazamiento en px para considerar swipe

    slideshow.addEventListener("touchstart", function (e) {
        startX = e.touches[0].clientX;
    });

    slideshow.addEventListener("touchmove", function (e) {
        endX = e.touches[0].clientX;
    });

    slideshow.addEventListener("touchend", function () {
        const deltaX = endX - startX;

        if (Math.abs(deltaX) > threshold) {
            if (deltaX < 0 && currentSlide < totalSlides - 1) {
                goToSlide(currentSlide + 1); // Swipe izquierda
            } else if (deltaX > 0 && currentSlide > 0) {
                goToSlide(currentSlide - 1); // Swipe derecha
            }
        }

        // Reset
        startX = 0;
        endX = 0;
    });

});