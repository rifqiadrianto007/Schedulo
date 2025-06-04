<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Schedulo - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#1565c0',
                        'schedul-blue': '#4A90E2'
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 font-poppins">
    <!-- Header -->
    <header class="bg-primary-blue px-4 py-3">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <h1 class="text-white text-2xl font-bold">Schedulo</h1>
                <div class="ml-2 w-6 h-6 bg-white rounded-full flex items-center justify-center">
                    <i class="fas fa-check text-primary-blue text-sm"></i>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex space-x-1">
                <a href="{{ route('home') }}"
                    class="px-4 py-2 rounded-full font-medium {{ request()->routeIs('home') ? 'bg-white text-gray-800' : 'text-white hover:bg-blue-600' }}">
                    Home
                </a>
                <a href="{{ route('event') }}"
                    class="px-4 py-2 rounded-full font-medium {{ request()->routeIs('event') ? 'bg-white text-gray-800' : 'text-white hover:bg-blue-600' }}">
                    Event
                </a>
                <a href="{{ route('venue') }}"
                    class="px-4 py-2 rounded-full font-medium {{ request()->routeIs('venue') ? 'bg-white text-gray-800' : 'text-white hover:bg-blue-600' }}">
                    Venue
                </a>
                <a href="{{ route('home') }}"
                    class="px-4 py-2 rounded-full font-medium {{ request()->routeIs('home') ? 'bg-white text-gray-800' : 'text-white hover:bg-blue-600' }}">
                    Jadwal
                </a>
            </nav>

            <!-- Login Button -->
            <div class="flex items-center">
                <a href="{{ route('login') }}"
                    class="bg-yellow-400 text-black px-4 py-2 rounded-full font-bold text-sm hover:bg-yellow-500 inline-block text-center">
                    MASUK
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-white" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav id="mobileMenu" class="hidden md:hidden mt-4 pb-2">
            <div class="flex flex-col space-y-2">
                <a href="{{ route('home') }}"
                    class="px-4 py-2 rounded-full font-medium {{ request()->routeIs('home') ? 'bg-white text-gray-800' : 'text-white hover:bg-blue-600' }}">
                    Home
                </a>
                <a href="{{ route('event') }}"
                    class="px-4 py-2 rounded-full font-medium {{ request()->routeIs('event') ? 'bg-white text-gray-800' : 'text-white hover:bg-blue-600' }}">
                    Event
                </a>
                <a href="{{ route('venue') }}"
                    class="px-4 py-2 rounded-full font-medium {{ request()->routeIs('venue') ? 'bg-white text-gray-800' : 'text-white hover:bg-blue-600' }}">
                    Venue
                </a>
                <a href="{{ route('home') }}"
                    class="px-4 py-2 rounded-full font-medium {{ request()->routeIs('home') ? 'bg-white text-gray-800' : 'text-white hover:bg-blue-600' }}">
                    Jadwal
                </a>
            </div>
        </nav>
    </header>

    <!-- Hero Carousel Section -->
    <section class="bg-gray-100 py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="relative">
                <!-- Carousel Container with 3-slide preview -->
                <div class="flex items-center justify-center space-x-4">
                    <!-- Previous slide (with opacity) -->
                    <div class="flex-shrink-0 w-1/4 opacity-40 transform scale-90 hidden lg:block">
                        <img id="prevSlideImg" src="https://via.placeholder.com/300x200/4A90E2/ffffff?text=Event+Image"
                            alt="Previous Slide" class="w-full h-auto rounded-lg shadow-lg">
                    </div>

                    <!-- Current slide (main) -->
                    <div class="flex-shrink-0 w-full lg:w-1/2">
                        <img id="currentSlideImg"
                            src="https://via.placeholder.com/600x400/1565c0/ffffff?text=Featured+Event"
                            alt="Current Slide" class="w-full h-auto rounded-lg shadow-lg">
                    </div>

                    <!-- Next slide (with opacity) -->
                    <div class="flex-shrink-0 w-1/4 opacity-40 transform scale-90 hidden lg:block">
                        <img id="nextSlideImg" src="https://via.placeholder.com/300x200/4A90E2/ffffff?text=Event+Image"
                            alt="Next Slide" class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button id="prevBtn"
                    class="absolute left-2 lg:left-8 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-90 rounded-full p-3 shadow-lg z-10 transition-all">
                    <i class="fas fa-chevron-left text-gray-700 text-lg"></i>
                </button>
                <button id="nextBtn"
                    class="absolute right-2 lg:right-8 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-90 rounded-full p-3 shadow-lg z-10 transition-all">
                    <i class="fas fa-chevron-right text-gray-700 text-lg"></i>
                </button>

                <!-- Dots Indicator -->
                <div class="flex justify-center mt-6 space-x-2">
                    <button class="dot w-3 h-3 rounded-full bg-primary-blue active transition-all"
                        data-slide="0"></button>
                    <button class="dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition-all"
                        data-slide="1"></button>
                    <button class="dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition-all"
                        data-slide="2"></button>
                    <button class="dot w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition-all"
                        data-slide="3"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Grid Section -->
    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Daftar Kegiatan</h2>

            <!-- Events Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Event Card 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border hover:shadow-lg transition-shadow">
                    <img src="https://via.placeholder.com/400x240/1565c0/ffffff?text=P2MW+Event" alt="Event"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-semibold text-gray-800 mb-3 text-lg">Pembinaan Mahasiswa Wirausaha (P2MW)</h3>
                        <div class="text-sm text-primary-blue bg-blue-50 px-3 py-1 rounded-full inline-block mb-4">
                            <i class="far fa-calendar-alt mr-1"></i>
                            24 Jan - 24 Jan
                        </div>
                        <button
                            class="w-full bg-primary-blue text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                            Detail
                        </button>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border hover:shadow-lg transition-shadow">
                    <img src="https://via.placeholder.com/400x240/4A90E2/ffffff?text=Workshop+Event" alt="Event"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-semibold text-gray-800 mb-3 text-lg">Workshop Digital Marketing</h3>
                        <div class="text-sm text-primary-blue bg-blue-50 px-3 py-1 rounded-full inline-block mb-4">
                            <i class="far fa-calendar-alt mr-1"></i>
                            28 Jan - 28 Jan
                        </div>
                        <button
                            class="w-full bg-primary-blue text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                            Detail
                        </button>
                    </div>
                </div>

                <!-- Event Card 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border hover:shadow-lg transition-shadow">
                    <img src="https://via.placeholder.com/400x240/1565c0/ffffff?text=Seminar+Event" alt="Event"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-semibold text-gray-800 mb-3 text-lg">Seminar Teknologi AI</h3>
                        <div class="text-sm text-primary-blue bg-blue-50 px-3 py-1 rounded-full inline-block mb-4">
                            <i class="far fa-calendar-alt mr-1"></i>
                            30 Jan - 30 Jan
                        </div>
                        <button
                            class="w-full bg-primary-blue text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                            Detail
                        </button>
                    </div>
                </div>

                <!-- Event Card 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border hover:shadow-lg transition-shadow">
                    <img src="https://via.placeholder.com/400x240/4A90E2/ffffff?text=Training+Event" alt="Event"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-semibold text-gray-800 mb-3 text-lg">Pelatihan Leadership</h3>
                        <div class="text-sm text-primary-blue bg-blue-50 px-3 py-1 rounded-full inline-block mb-4">
                            <i class="far fa-calendar-alt mr-1"></i>
                            02 Feb - 02 Feb
                        </div>
                        <button
                            class="w-full bg-primary-blue text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                            Detail
                        </button>
                    </div>
                </div>

                <!-- Event Card 5 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border hover:shadow-lg transition-shadow">
                    <img src="https://via.placeholder.com/400x240/1565c0/ffffff?text=Conference+Event" alt="Event"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-semibold text-gray-800 mb-3 text-lg">Konferensi Mahasiswa</h3>
                        <div class="text-sm text-primary-blue bg-blue-50 px-3 py-1 rounded-full inline-block mb-4">
                            <i class="far fa-calendar-alt mr-1"></i>
                            05 Feb - 05 Feb
                        </div>
                        <button
                            class="w-full bg-primary-blue text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                            Detail
                        </button>
                    </div>
                </div>

                <!-- Event Card 6 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border hover:shadow-lg transition-shadow">
                    <img src="https://via.placeholder.com/400x240/4A90E2/ffffff?text=Webinar+Event" alt="Event"
                        class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-semibold text-gray-800 mb-3 text-lg">Webinar Karir</h3>
                        <div class="text-sm text-primary-blue bg-blue-50 px-3 py-1 rounded-full inline-block mb-4">
                            <i class="far fa-calendar-alt mr-1"></i>
                            08 Feb - 08 Feb
                        </div>
                        <button
                            class="w-full bg-primary-blue text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- More Button -->
            <div class="text-center">
                <button
                    class="bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold text-lg hover:bg-yellow-500 transition-colors">
                    Lihat Semua Event
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary-blue text-white px-6 py-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <img alt="Yellow pentagon shaped logo with red and green emblem and black text Universitas Jember"
                    class="w-[80px] h-[80px]" height="80"
                    src="https://via.placeholder.com/80x80/FCD34D/000000?text=UNEJ" width="80" />
            </div>

            <!-- Content -->
            <div class="flex-1 md:px-6">
                <h2 class="font-bold text-white text-lg leading-tight mb-3">
                    UNIVERSITAS JEMBER
                </h2>
                <div class="text-sm leading-relaxed space-y-2">
                    <p><strong>Kampus Jember:</strong> Jl. Kalimantan Tegalboto No.37, Krajan Timur, Sumbersari,
                        Kec. Sumbersari, Kabupaten Jember.</p>
                    <p><strong>Kampus Bondowoso:</strong> Jl. Diponegoro, Poncogati, Curah Dami, Kabupaten
                        Bondowoso.</p>
                    <p><strong>Kampus Lumajang:</strong> Jl. Brigjen. Katamso, Tompokersan, Lumajang.</p>
                    <p><strong>Kampus Pasuruan:</strong> Jl. KH. Mansyur No.207, Tembokrejo, Kec. Pasuruan.</p>
                </div>
            </div>

            <!-- Social Links -->
            <div class="flex flex-col md:items-end text-sm space-y-3">
                <div class="font-bold text-white mb-1">
                    More About us :
                </div>
                <div class="flex flex-col space-y-2">
                    <a class="flex items-center space-x-2 hover:underline transition-all"
                        href="https://www.unej.ac.id" target="_blank">
                        <i class="fas fa-globe text-sm"></i>
                        <span>unej.ac.id</span>
                    </a>
                    <a class="flex items-center space-x-2 hover:underline transition-all"
                        href="https://www.instagram.com/univ_jember" target="_blank">
                        <i class="fab fa-instagram text-sm"></i>
                        <span>@univ_jember</span>
                    </a>
                    <a class="flex items-center space-x-2 hover:underline transition-all"
                        href="https://www.facebook.com/universitasjember" target="_blank">
                        <i class="fab fa-facebook-f text-sm"></i>
                        <span>Universitas Jember</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }

        // Carousel functionality
        let currentSlide = 0;
        const totalSlides = 4;

        // Array of slide images
        const slides = [
            "https://via.placeholder.com/600x400/1565c0/ffffff?text=Featured+Event+1",
            "https://via.placeholder.com/600x400/4A90E2/ffffff?text=Featured+Event+2",
            "https://via.placeholder.com/600x400/1565c0/ffffff?text=Featured+Event+3",
            "https://via.placeholder.com/600x400/4A90E2/ffffff?text=Featured+Event+4"
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
            if (prevSlideImg) prevSlideImg.src = slides[getSlideIndex(-1)];
            if (nextSlideImg) nextSlideImg.src = slides[getSlideIndex(1)];

            // Update dots
            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.remove('bg-gray-300');
                    dot.classList.add('bg-primary-blue', 'active');
                } else {
                    dot.classList.remove('bg-primary-blue', 'active');
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
    </script>
</body>

</html>
