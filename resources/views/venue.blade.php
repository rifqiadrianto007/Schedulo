<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Schedulo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
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

<body class="bg-gray-50 font-poppins" x-data="venueApp()">
    <!-- Header -->
    <x-header/>

    <!-- Search Section -->
    <div class="bg-gray-200 py-4">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-4">
                <label class="text-gray-700 font-medium">Cari Lokasi :</label>
                <div class="flex-1 max-w-2xl w-full">
                    <input type="text" x-model="searchQuery"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-blue"
                        placeholder="Masukkan lokasi...">
                </div>
                <div class="flex space-x-2">
                    <button @click="searchVenues()"
                        class="bg-orange-400 hover:bg-orange-500 text-white px-6 py-2 rounded font-medium transition-colors">
                        Search
                    </button>
                    <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-800 px-6 py-2 rounded font-medium transition-colors">
                        Ajukan Event
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Venue Grid -->
    <main class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="venue in filteredVenues" :key="venue.id">
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative">
                        <img :src="venue.image" :alt="venue.name"
                             class="w-full h-48 object-cover"
                             onerror="this.src={{ asset('img/AuditFasilkom.png') }}">
                        <div class="absolute top-2 left-2 bg-yellow-400 text-gray-800 px-2 py-1 rounded text-xs font-medium">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            <span x-text="venue.location || 'Kampus'"></span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 mb-2" x-text="venue.name"></h3>
                        <p class="text-gray-600 text-sm mb-4" x-text="venue.address"></p>
                        <button @click="openModal(venue)"
                            class="w-full bg-primary-blue hover:bg-blue-700 text-white py-2 rounded font-medium transition-colors duration-300">
                            Detail
                        </button>
                    </div>
                </div>
            </template>
        </div>

        <!-- No Results Message -->
        <div x-show="filteredVenues.length === 0" class="text-center py-12">
            <i class="fas fa-search text-gray-400 text-4xl mb-4"></i>
            <p class="text-gray-600 text-lg">Tidak ada venue yang ditemukan</p>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center space-x-2 mt-8" x-show="filteredVenues.length > 0">
            <button @click="previousPage()" :disabled="currentPage === 1"
                class="w-8 h-8 flex items-center justify-center bg-white border border-gray-300 rounded hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                <i class="fas fa-chevron-left text-gray-600"></i>
            </button>
            <template x-for="page in totalPages" :key="page">
                <button @click="goToPage(page)"
                    :class="currentPage === page ? 'bg-primary-blue text-white' : 'bg-white border border-gray-300 hover:bg-gray-50'"
                    class="w-8 h-8 flex items-center justify-center rounded transition-colors"
                    x-text="page">
                </button>
            </template>
            <button @click="nextPage()" :disabled="currentPage === totalPages"
                class="w-8 h-8 flex items-center justify-center bg-white border border-gray-300 rounded hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                <i class="fas fa-chevron-right text-gray-600"></i>
            </button>
        </div>
    </main>

    <!-- Modal -->
    <div x-show="showModal"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
         @click.self="closeModal()"
         @keydown.escape.window="closeModal()">

        <div x-show="showModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">

            <div class="p-6">
                <!-- Modal Header with Image -->
                <div class="mb-6">
                    <img :src="selectedVenue?.image" :alt="selectedVenue?.name"
                         class="w-full h-64 object-cover rounded-lg mb-4"
                         onerror="this.src={{ asset('img/AuditFasilkom.png') }}">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2" x-text="selectedVenue?.name"></h2>
                    <p class="text-gray-600 flex items-center">
                        <i class="fas fa-map-marker-alt mr-2 text-yellow-500"></i>
                        <span x-text="selectedVenue?.address"></span>
                    </p>
                </div>

                <!-- Modal Content -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Fasilitas -->
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                            <i class="fas fa-list-ul mr-2 text-primary-blue"></i>
                            Fasilitas :
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
                            Ketentuan :
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

                <!-- Modal Actions -->
                <div class="flex justify-center space-x-4 mt-8">
                    <button @click="closeModal()"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-8 py-2 rounded font-medium transition-colors">
                        Kembali
                    </button>
                    <button class="bg-primary-blue hover:bg-blue-700 text-white px-8 py-2 rounded font-medium transition-colors">
                        Booking Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer/>

    <script>
        function venueApp() {
            return {
                showModal: false,
                selectedVenue: null,
                searchQuery: '',
                currentPage: 1,
                itemsPerPage: 6,
                venues: [
                    {
                        id: 1,
                        name: 'Ruang Kelas B1 & B2',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        location: 'Kampus',
                        image: '{{ asset("img/AuditFasilkom.png") }}',
                        facilities: [
                            'Air Conditioner (2)',
                            'Kursi Lipat (150)',
                            'Proyektor (2)',
                            'Layar LCD',
                            'Sound System',
                            'Mic (2)'
                        ],
                        rules: [
                            'Alat menjadi tanggung jawab penyewa',
                            'Max Penggunaan hingga pukul 17:00 WIB',
                            'Maksimal Kapasitas 170 orang'
                        ]
                    },
                    {
                        id: 2,
                        name: 'Auditorium Utama',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        location: 'Kampus',
                        image: '{{ asset("img/AuditFasilkom.png") }}',
                        facilities: [
                            'Air Conditioner (4)',
                            'Kursi Theater (300)',
                            'Proyektor (3)',
                            'Layar LCD Besar',
                            'Sound System Professional',
                            'Mic Wireless (4)',
                            'Lighting System'
                        ],
                        rules: [
                            'Booking minimal 3 hari sebelumnya',
                            'Max Penggunaan hingga pukul 21:00 WIB',
                            'Maksimal Kapasitas 300 orang',
                            'Wajib menggunakan operator sound system'
                        ]
                    },
                    {
                        id: 3,
                        name: 'Ruang Seminar C1',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        location: 'Kampus',
                        image: '{{ asset("img/AuditFasilkom.png") }}',
                        facilities: [
                            'Air Conditioner (1)',
                            'Kursi Lipat (50)',
                            'Proyektor (1)',
                            'Layar LCD',
                            'Sound System',
                            'Mic (1)',
                            'Whiteboard'
                        ],
                        rules: [
                            'Cocok untuk seminar kecil',
                            'Max Penggunaan hingga pukul 17:00 WIB',
                            'Maksimal Kapasitas 50 orang'
                        ]
                    }
                ],

                get filteredVenues() {
                    if (!this.searchQuery.trim()) {
                        return this.venues;
                    }

                    return this.venues.filter(venue =>
                        venue.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                        venue.address.toLowerCase().includes(this.searchQuery.toLowerCase())
                    );
                },

                get totalPages() {
                    return Math.ceil(this.filteredVenues.length / this.itemsPerPage);
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
                    if (this.currentPage > 1) {
                        this.currentPage--;
                    }
                },

                nextPage() {
                    if (this.currentPage < this.totalPages) {
                        this.currentPage++;
                    }
                }
            }
        }
    </script>
</body>

</html>
