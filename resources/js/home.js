    // Carousel functionality
    let currentSlide = 0;
    const totalSlides = 4;

    // Array of slide images
    const slides = [
    "{{ asset('img/kegiatan1.jpg') }}",
    "{{ asset('img/logo-unej.png') }}",
    "{{ asset('img/kegiatan2.png') }}",
    "{{ asset('img/AwardNight.png') }}",
    "{{ asset('img/kegiatan1.jpg') }}",
    "{{ asset('img/logo-unej.png') }}",
    "{{ asset('img/kegiatan2.png') }}",
    "{{ asset('img/AwardNight.png') }}"
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
    // Update main slide image
    currentSlideImg.src = slides[currentSlide];

    // Update preview images
    prevSlideImg.src = slides[getSlideIndex(-1)];
    nextSlideImg.src = slides[getSlideIndex(1)];

    // Update dots
    dots.forEach((dot, index) => {
    if (index === currentSlide) {
    dot.classList.remove('bg-gray-300');
    dot.classList.add('bg-gray-400', 'active');
    } else {
    dot.classList.remove('bg-gray-400', 'active');
    dot.classList.add('bg-gray-300');
    }
    });
    }

    function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateCarousel();
    }

    function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateCarousel();
    }

    // Event listeners for navigation
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    // Dot navigation
    dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
    currentSlide = index;
    updateCarousel();
    });
    });

    // Auto-play carousel
    setInterval(nextSlide, 5000);

    // Initialize carousel
    updateCarousel();
