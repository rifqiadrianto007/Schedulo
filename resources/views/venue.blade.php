@extends('layouts.app')

@section('content')
    <div x-data="venueApp({{ $venues->toJson() }})" class="py-4">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-4">
                <label class="text-gray-700 font-medium">Cari Lokasi :</label>
                <div class="flex-1 max-w-2xl w-full">
                    <input type="text" x-model="searchQuery"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan lokasi...">
                </div>
                <div class="flex space-x-2">
                    <button @click="searchVenues()"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                        Search
                    </button>
                </div>
            </div>
        </div>

        <!-- Venue Grid -->
        <main class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="venue in paginatedVenues" :key="venue.id">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="relative">
                            <img :src="venue.image"  :alt="venue.nama_tempat" class="w-full h-48 object-cover" :onerror="'this.src=\'' + fallbackImage + '\''">
                            <div class="absolute top-2 left-2 bg-yellow-400 text-gray-800 px-2 py-1 rounded text-xs font-medium">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                <span>Kampus</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800 mb-2" x-text="venue.nama_tempat"></h3>
                            <p class="text-gray-600 text-sm mb-4" x-text="venue.alamat"></p>
                            <button @click="openModal(venue)"
                                class="w-full bg-primary-blue hover:bg-blue-700 text-white py-2 rounded font-medium transition-colors duration-300">
                                Detail
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </main>

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
            @click.self="closeModal()" @keydown.escape.window="closeModal()" x-transition>
            <div x-show="showModal" class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6"
                x-transition>
                <img :src="selectedVenue?.image" :alt="selectedVenue?.name" class="w-full h-64 object-cover rounded-lg mb-4"
                    :onerror="'this.src=\'' + fallbackImage + '\''">
                <h2 class="text-2xl font-bold text-gray-800 mb-2" x-text="selectedVenue?.name"></h2>
                <p class="text-gray-600 flex items-center mb-6">
                    <i class="fas fa-map-marker-alt mr-2 text-yellow-500"></i>
                    <span x-text="selectedVenue?.address"></span>
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Fasilitas -->
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                            <i class="fas fa-list-ul mr-2 text-primary-blue"></i>
                            Fasilitas:
                        </h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <template x-for="facility in selectedVenue?.facilities" :key="facility">
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 mr-3 text-xs"></i>
                                    <span x-text="facility"></span>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <!-- Ketentuan -->
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                            <i class="fas fa-exclamation-triangle mr-2 text-orange-500"></i>
                            Ketentuan:
                        </h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <template x-for="rule in selectedVenue?.rules" :key="rule">
                                <li class="flex items-start">
                                    <i class="fas fa-info-circle text-blue-500 mr-3 text-xs mt-0.5"></i>
                                    <span x-text="rule"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>

                <div class="flex justify-center space-x-4 mt-8">
                    <button @click="closeModal()"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-8 py-2 rounded font-medium transition-colors">
                        Kembali
                    </button>
                    <a href="{{ route('form.event') }}"
                    class="bg-primary-blue hover:bg-blue-700 text-white px-8 py-2 rounded font-medium transition-colors">
                    Booking Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function venueApp(venuesFromLaravel) {
    return {
        showModal: false,
        selectedVenue: null,
        searchQuery: '',
        currentPage: 1,
        itemsPerPage: 6,
        fallbackImage: '/img/AuditFasilkom.png',
        venues: venuesFromLaravel,

        get filteredVenues() {
            if (!this.searchQuery.trim()) return this.venues;
            const keyword = this.searchQuery.toLowerCase();
            return this.venues.filter(venue =>
                venue.nama_tempat.toLowerCase().includes(keyword) ||
                venue.alamat.toLowerCase().includes(keyword)
            );
        },

        get totalPages() {
            return Math.ceil(this.filteredVenues.length / this.itemsPerPage);
        },

        get paginatedVenues() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            return this.filteredVenues.slice(start, start + this.itemsPerPage);
        },

        searchVenues() {
            this.currentPage = 1;
        },

        openModal(venue) {
            this.selectedVenue = venue;
            this.showModal = true;
            document.body.style.overflow = 'hidden';
        },

        closeModal() {
            this.showModal = false;
            document.body.style.overflow = 'auto';
            setTimeout(() => {
                this.selectedVenue = null;
            }, 200);
        },

        goToPage(page) {
            this.currentPage = page;
        },

        previousPage() {
            if (this.currentPage > 1) this.currentPage--;
        },

        nextPage() {
            if (this.currentPage < this.totalPages) this.currentPage++;
        }
    }
}
</script>

{{-- @push('scripts')
    <script src="{{ asset('resources\js\venue.js') }}"></script>
@endpush --}}
