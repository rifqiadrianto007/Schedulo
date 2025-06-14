document.addEventListener('DOMContentLoaded', function () {
    let currentSlide = 0;
    const totalSlides = 4;

    const slides = [
        "/img/kegiatan1.jpg",
        "/img/logo-unej.png",
        "/img/kegiatan2.png",
        "/img/AwardNight.png"
    ];

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
        currentSlideImg.src = slides[currentSlide];
        prevSlideImg.src = slides[getSlideIndex(-1)];
        nextSlideImg.src = slides[getSlideIndex(1)];

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
