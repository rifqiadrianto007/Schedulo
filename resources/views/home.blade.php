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
                        <img id="prevSlideImg" src="{{ asset('img/kegiatan1.jpg') }}" alt="Previous Slide"
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>

                    <!-- Current slide (main) -->
                    <div class="flex-shrink-0 w-1/2">
                        <img id="currentSlideImg" src="{{ asset('img/kegiatan2.png') }}" alt="Current Slide"
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>

                    <!-- Next slide (with opacity) -->
                    <div class="flex-shrink-0 w-1/4 opacity-40 transform scale-90">
                        <img id="nextSlideImg" src="{{ asset('img/kegiatan1.jpg') }}" alt="Next Slide"
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
                    <button class="dot w-3 h-3 rounded-full bg-gray-400 active" data-slide="0"></button>
                    <button class="dot w-3 h-3 rounded-full bg-gray-300" data-slide="1"></button>
                    <button class="dot w-3 h-3 rounded-full bg-gray-300" data-slide="2"></button>
                    <button class="dot w-3 h-3 rounded-full bg-gray-300" data-slide="3"></button>
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
                @for ($i = 1; $i <= 12; $i++)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border">
                        <img src="{{ asset('img/kegiatan' . (($i % 2) + 1) . '.png') }}" alt="Event"
                            class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800 mb-2">Pembinaan Mahasiswa Wirausaha (P2MW)</h3>
                            <div class="text-sm text-blue-600 bg-blue-100 px-2 py-1 rounded-full inline-block mb-3">
                                24 Jan - 24 Jan
                            </div>
                            <button
                                class="w-full bg-gray-400 text-white py-2 px-4 rounded-lg font-medium hover:bg-gray-500">
                                Detail
                            </button>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- More Button -->
            <div class="text-center">
                <button class="bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold text-lg hover:bg-yellow-500 w-full">
                    More
                </button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
