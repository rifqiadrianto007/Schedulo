@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <main class="container mx-auto p-6">
        <!-- Search Section -->
        <div class="mb-6">
            <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-4">
                <label class="text-gray-700 font-medium">Cari Event :</label>
                <div class="flex-1 max-w-2xl w-full">
                    <input type="text" id="searchInput"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan kata kunci pencarian...">
                </div>
                <div class="flex space-x-2">
                    <button
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                        Search
                    </button>
                    <a href="{{ route('login') }}"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                        Ajukan Event
                    </a>
                </div>
            </div>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Event Card Template (akan direpeat untuk setiap event) -->
            @for ($i = 1; $i <= 12; $i++)
                <div class="bg-white rounded-lg shadow-md overflow-hidden event-card">
                    <div class="relative">
                        <img src="{{ asset('img/kegiatan1.jpg') }}" alt=""
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">
                            Pembinaan Mahasiswa Wirausaha(P2MW)
                        </h3>
                        <p class="text-blue-600 text-sm mb-4">
                            <i class="far fa-calendar-alt mr-1"></i>
                            24 Jan - 24 Jan
                        </p>
                        <button onclick="showEventDetail()"
                            class="w-full bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded font-medium transition-colors">
                            Detail
                        </button>
                    </div>
                </div>
            @endfor
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center space-x-2">
            <button class="w-8 h-8 bg-gray-300 hover:bg-gray-400 rounded flex items-center justify-center">
                <i class="fas fa-chevron-left text-sm"></i>
            </button>
            <button class="w-8 h-8 bg-blue-600 text-white rounded flex items-center justify-center">1</button>
            <button class="w-8 h-8 bg-gray-300 hover:bg-gray-400 rounded flex items-center justify-center">2</button>
            <button class="w-8 h-8 bg-gray-300 hover:bg-gray-400 rounded flex items-center justify-center">3</button>
            <button class="w-8 h-8 bg-gray-300 hover:bg-gray-400 rounded flex items-center justify-center">
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>
    </main>

    <!-- Modal Detail Event -->
    <div id="eventModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg max-w-4xl w-full max-h-screen overflow-y-auto">
                <!-- Modal content will be loaded here -->
                <div id="modalContent">
                    <!-- Content will be loaded via JavaScript -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/event.js') }}"></script>
@endpush
