document.addEventListener('DOMContentLoaded', function () {
    let currentSlide = 0;

    if (!window.carouselEvents || carouselEvents.length === 0) return;

    const totalSlides = carouselEvents.length;
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const currentSlideImg = document.getElementById('currentSlideImg');
    const prevSlideImg = document.getElementById('prevSlideImg');
    const nextSlideImg = document.getElementById('nextSlideImg');

    function getSlideIndex(offset) {
        return (currentSlide + offset + totalSlides) % totalSlides;
    }

    function updateCarousel() {
        currentSlideImg.src = `/storage/${carouselEvents[currentSlide].poster}`;
        prevSlideImg.src = `/storage/${carouselEvents[getSlideIndex(-1)].poster}`;
        nextSlideImg.src = `/storage/${carouselEvents[getSlideIndex(1)].poster}`;

        dots.forEach((dot, index) => {
            dot.classList.toggle('bg-gray-400', index === currentSlide);
            dot.classList.toggle('bg-gray-300', index !== currentSlide);
            dot.classList.toggle('active', index === currentSlide);
        });
    }

    function nextSlideFunc() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    }

    function prevSlideFunc() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }

    if (prevBtn && nextBtn && currentSlideImg) {
        nextBtn.addEventListener('click', nextSlideFunc);
        prevBtn.addEventListener('click', prevSlideFunc);

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                updateCarousel();
            });
        });

        setInterval(nextSlideFunc, 5000);
        updateCarousel();
    }
});
