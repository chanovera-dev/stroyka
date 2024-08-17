function slideshowHero() {
    const slideshow = document.getElementById('slideshow');
    const button1 = document.getElementById('slideshow-button1');
    const button2 = document.getElementById('slideshow-button2');
    const button3 = document.getElementById('slideshow-button3');
    const card1 = document.querySelector('.slide1');
    const card2 = document.querySelector('.slide2');
    const card3 = document.querySelector('.slide3');

    let startX = 0;
    let currentX = 0;

    function left0() {slideshow.style.transform = "translateX(0)";}
    function left33() {slideshow.style.transform = "translateX(-33.3333%)";}
    function left66() {slideshow.style.transform = "translateX(-66.6666%)";}

    card1.classList.add('active');

    button1.addEventListener('click', function(){
        left0();
        setActiveSlide(1);
    });
    button2.addEventListener('click', function(){
        left33();
        setActiveSlide(2);
    });
    button3.addEventListener('click', function(){
        left66();
        setActiveSlide(3);
    });

    // Función para establecer la diapositiva activa
    function setActiveSlide(slideNumber) {
        button1.classList.toggle('active', slideNumber === 1);
        button2.classList.toggle('active', slideNumber === 2);
        button3.classList.toggle('active', slideNumber === 3);
        card1.classList.toggle('active', slideNumber === 1);
        card2.classList.toggle('active', slideNumber === 2);
        card3.classList.toggle('active', slideNumber === 3);
    }

    // Eventos táctiles
    slideshow.addEventListener('touchstart', function(e) {
        startX = e.touches[0].clientX;
    });

    slideshow.addEventListener('touchmove', function(e) {
        currentX = e.touches[0].clientX;
    });

    slideshow.addEventListener('touchend', function() {
        const deltaX = startX - currentX;
        if (deltaX > 50) {
            // Deslizar hacia la izquierda
            if (button1.classList.contains('active')) {
                left33();
                setActiveSlide(2);
            } else if (button2.classList.contains('active')) {
                left66();
                setActiveSlide(3);
            }
        } else if (deltaX < -50) {
            // Deslizar hacia la derecha
            if (button3.classList.contains('active')) {
                left33();
                setActiveSlide(2);
            } else if (button2.classList.contains('active')) {
                left0();
                setActiveSlide(1);
            }
        }
    });
}

slideshowHero();
