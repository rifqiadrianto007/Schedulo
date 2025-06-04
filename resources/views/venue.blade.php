<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Schedulo
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap" rel="stylesheet" />
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

<body class="bg-gray-50" x-data="venueApp()">
    <!-- Header -->
    <x-header />

    <!-- Search Section -->
    <div class="bg-gray-200 py-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-4">
                <label class="text-gray-700 font-medium">Cari Lokasi :</label>
                <div class="flex-1 max-w-2xl">
                    <input type="text"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan lokasi...">
                </div>
                <button class="bg-orange-400 hover:bg-orange-500 text-white px-6 py-2 rounded font-medium">
                    Search
                </button>
                <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-800 px-6 py-2 rounded font-medium">
                    Ajukan Event
                </button>
            </div>
        </div>
    </div>

    <!-- Venue Grid -->
    <main class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="venue in venues" :key="venue.id">
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        <img :src="venue.image" :alt="venue.name" class="w-full h-48 object-cover">
                        <div
                            class="absolute top-2 left-2 bg-yellow-400 text-gray-800 px-2 py-1 rounded text-xs font-medium">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 mb-2" x-text="venue.name"></h3>
                        <p class="text-gray-600 text-sm mb-4" x-text="venue.address"></p>
                        <button @click="openModal(venue)"
                            class="w-full bg-gray-400 hover:bg-gray-500 text-white py-2 rounded font-medium transition-colors">
                            Detail
                        </button>
                    </div>
                </div>
            </template>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center space-x-2 mt-8">
            <button
                class="w-8 h-8 flex items-center justify-center bg-white border border-gray-300 rounded hover:bg-gray-50">
                <i class="fas fa-chevron-left text-gray-600"></i>
            </button>
            <button class="w-8 h-8 flex items-center justify-center bg-blue-600 text-white rounded">1</button>
            <button
                class="w-8 h-8 flex items-center justify-center bg-white border border-gray-300 rounded hover:bg-gray-50">2</button>
            <button
                class="w-8 h-8 flex items-center justify-center bg-white border border-gray-300 rounded hover:bg-gray-50">3</button>
            <button
                class="w-8 h-8 flex items-center justify-center bg-white border border-gray-300 rounded hover:bg-gray-50">
                <i class="fas fa-chevron-right text-gray-600"></i>
            </button>
        </div>
    </main>

    <!-- Modal -->
    <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" @click.self="closeModal()">

        <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">

            <div class="p-6">
                <!-- Modal Header with Image -->
                <div class="mb-6">
                    <img :src="selectedVenue?.image" :alt="selectedVenue?.name"
                        class="w-full h-64 object-cover rounded-lg mb-4">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2" x-text="selectedVenue?.name"></h2>
                    <p class="text-gray-600" x-text="selectedVenue?.address"></p>
                </div>

                <!-- Modal Content -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Fasilitas -->
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3">Fasilitas :</h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <template x-for="facility in selectedVenue?.facilities" :key="facility">
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-gray-400 rounded-full mr-3"></span>
                                    <span x-text="facility"></span>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <!-- Ketentuan -->
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3">Ketentuan :</h3>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <template x-for="rule in selectedVenue?.rules" :key="rule">
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-gray-400 rounded-full mr-3"></span>
                                    <span x-text="rule"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>

                <!-- Modal Actions -->
                <div class="flex justify-center mt-8">
                    <button @click="closeModal()"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-8 py-2 rounded font-medium transition-colors">
                        Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <x-footer />

    <script>
        function venueApp() {
            return {
                showModal: false,
                selectedVenue: null,
                venues: [{
                        id: 1,
                        name: 'Ruang Kelas B1 & B2',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        image: '/img/kegiatan1.jpg',
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
                        name: 'Ruang Kelas B1 & B2',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        image: '/img/kegiatan1.jpg',
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
                        id: 3,
                        name: 'Ruang Kelas B1 & B2',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        image: '/img/kegiatan1.jpg',
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
                        id: 4,
                        name: 'Ruang Kelas B1 & B2',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        image: '/img/kegiatan1.jpg',
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
                        id: 5,
                        name: 'Ruang Kelas B1 & B2',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        image: '/img/kegiatan1.jpg',
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
                        id: 6,
                        name: 'Ruang Kelas B1 & B2',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        image: '/img/kegiatan1.jpg',
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
                        id: 7,
                        name: 'Ruang Kelas B1 & B2',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        image: '/img/kegiatan1.jpg',
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
                        id: 8,
                        name: 'Ruang Kelas B1 & B2',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        image: '/img/kegiatan1.jpg',
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
                        id: 9,
                        name: 'Ruang Kelas B1 & B2',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        image: '/img/kegiatan1.jpg',
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
                    }
                ],

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
                }
            }
        }
    </script>
</body>

</html>
