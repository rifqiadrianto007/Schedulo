@extends('layouts.app')

@section('content')
    <!-- Hero Carousel Section -->
    <section class="bg-gray-100 py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="relative">
                <!-- Carousel Container with 3-slide preview -->
                <div class="flex items-center justify-center space-x-4">
                    <!-- Previous slide (with opacity) -->
                    <div class="flex-shrink-0 w-1/4 opacity-40 transform scale-90">
                        <img id="prevSlideImg" src="" alt="Previous Slide"
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>

                    <!-- Current slide (main) -->
                    <div class="flex-shrink-0 w-1/2">
                        <img id="currentSlideImg" src="" alt="Current Slide"
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>

                    <!-- Next slide (with opacity) -->
                    <div class="flex-shrink-0 w-1/4 opacity-40 transform scale-90">
                        <img id="nextSlideImg" src="" alt="Next Slide"
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button id="prevBtn"
                    class="absolute left-8 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-90 rounded-full p-3 shadow-lg z-10">
                    <i class="fas fa-chevron-left text-gray-700 text-lg"></i>
                </button>
                <button id="nextBtn"
                    class="absolute right-8 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-90 rounded-full p-3 shadow-lg z-10">
                    <i class="fas fa-chevron-right text-gray-700 text-lg"></i>
                </button>

                <!-- Dots Indicator -->
                <div class="flex justify-center mt-6 space-x-2">
                    @foreach ($carouselEvents as $index => $event)
                        <button class="dot w-3 h-3 rounded-full bg-gray-300" data-slide="{{ $index }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Events Grid Section -->
    <section class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Daftar Kegiatan</h2>

            <!-- Events Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($events as $event)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border">
                        <img src="{{ asset('storage/' . $event->poster) }}" alt="Event" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800 mb-2">{{ $event->nama_kegiatan }}</h3>
                            <div class="text-sm text-blue-600 bg-blue-100 px-2 py-1 rounded-full inline-block mb-3">
                                {{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        const carouselEvents = @json($carouselEvents);
        console.log("carouselEvents:", carouselEvents);
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentSlide = 0;
            const totalSlides = carouselEvents.length;

            if (totalSlides === 0) return;

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
                const current = carouselEvents[currentSlide];
                const prev = carouselEvents[getSlideIndex(-1)];
                const next = carouselEvents[getSlideIndex(1)];

                currentSlideImg.src = `/storage/${current.poster}`;
                prevSlideImg.src = `/storage/${prev.poster}`;
                nextSlideImg.src = `/storage/${next.poster}`;

                // Debug lognya, soalnya kalau pakai hari sekarang di log ga muncul muncul
                console.log("Current src:", currentSlideImg.src);

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

                updateCarousel();
                setInterval(nextSlideFunc, 5000);
            }
        });
    </script>
@endpush
