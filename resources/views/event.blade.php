{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedulo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
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
                <a href="{{ route('home') }}" class="px-4 py-2 bg-white text-gray-800 rounded-full font-medium">Home</a>
                <a href="{{ route('event') }}"
                    class="px-4 py-2 text-white hover:bg-blue-600 rounded-full font-medium">Event</a>
                <a href="{{ route('venue') }}"
                    class="px-4 py-2 text-white hover:bg-blue-600 rounded-full font-medium">Venue</a>
                <a href="{{ route('home') }}"
                    class="px-4 py-2 text-white hover:bg-blue-600 rounded-full font-medium">Jadwal</a>
            </nav>

            <!-- Login Button -->
            <div class="flex items-center">
                <a href="{{ route('login') }}"
                    class="bg-yellow-400 text-black px-4 py-2 rounded-full font-bold text-sm hover:bg-yellow-500 inline-block text-center">
                    MASUK
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        <!-- Search Section -->
        <div class="mb-6">
            <div class="flex items-center space-x-4">
                <label class="text-gray-700 font-medium">Cari Event :</label>
                <div class="flex-1 max-w-2xl">
                    <input type="text" id="searchInput"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan kata kunci pencarian...">
                </div>
                <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-medium">
                    Search
                </button>
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-medium">
                    Ajukan Event
                </button>
            </div>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Event Card Template (akan direpeat untuk setiap event) -->
            @for ($i = 1; $i <= 12; $i++)
                <div class="bg-white rounded-lg shadow-md overflow-hidden event-card">
                    <div class="relative">
                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIwIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDMyMCAxODAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMjAiIGhlaWdodD0iMTgwIiBmaWxsPSIjMzQ0ODVGIi8+CjxyZWN0IHg9IjIwIiB5PSIyMCIgd2lkdGg9IjI4MCIgaGVpZ2h0PSIxNDAiIGZpbGw9IiM1RDZBN0QiLz4KPGcgZmlsbD0iI0ZGRkZGRiI+CjxyZWN0IHg9IjQwIiB5PSI0MCIgd2lkdGg9IjgwIiBoZWlnaHQ9IjEwMCIgcng9IjQiLz4KPHJlY3QgeD0iMTQwIiB5PSI0MCIgd2lkdGg9IjgwIiBoZWlnaHQ9IjEwMCIgcng9IjQiLz4KPHJlY3QgeD0iMjQwIiB5PSI0MCIgd2lkdGg9IjgwIiBoZWlnaHQ9IjEwMCIgcng9IjQiLz4KPC9nPgo8IS0tIERlY29yYXRpdmUgZG90cyAtLT4KPGNpcmNsZSBjeD0iNzAiIGN5PSIxMyIgcj0iMyIgZmlsbD0iI0ZGRkZGRiIvPgo8Y2lyY2xlIGN4PSI4NSIgY3k9IjEzIiByPSIzIiBmaWxsPSIjRkZGRkZGIi8+CjxjaXJjbGUgY3g9IjEwMCIgY3k9IjEzIiByPSIzIiBmaWxsPSIjRkZGRkZGIi8+CjxjaXJjbGUgY3g9IjIyMCIgY3k9IjEzIiByPSIzIiBmaWxsPSIjRkZGRkZGIi8+CjxjaXJjbGUgY3g9IjIzNSIgY3k9IjEzIiByPSIzIiBmaWxsPSIjRkZGRkZGIi8+CjxjaXJjbGUgY3g9IjI1MCIgY3k9IjEzIiByPSIzIiBmaWxsPSIjRkZGRkZGIi8+CjxjaXJjbGUgY3g9IjcwIiBjeT0iMTY3IiByPSIzIiBmaWxsPSIjRkZGRkZGIi8+CjxjaXJjbGUgY3g9Ijg1IiBjeT0iMTY3IiByPSIzIiBmaWxsPSIjRkZGRkZGIi8+CjxjaXJjbGUgY3g9IjEwMCIgY3k9IjE2NyIgcj0iMyIgZmlsbD0iI0ZGRkZGRiIvPgo8Y2lyY2xlIGN4PSIyMjAiIGN5PSIxNjciIHI9IjMiIGZpbGw9IiNGRkZGRkYiLz4KPGNpcmNsZSBjeD0iMjM1IiBjeT0iMTY3IiByPSIzIiBmaWxsPSIjRkZGRkZGIi8+CjxjaXJjbGUgY3g9IjI1MCIgY3k9IjE2NyIgcj0iMyIgZmlsbD0iI0ZGRkZGRiIvPgo8L3N2Zz4K"
                            alt="Event Image" class="w-full h-48 object-cover">
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

    <!-- Footer -->
    <x-footer />

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

    <script>
        function showEventDetail() {
            // Load detail event content
            const modalContent = document.getElementById('modalContent');
            modalContent.innerHTML = `
                <!-- Header -->
                <div class="bg-blue-600 text-white p-4 flex justify-between items-center">
                    <div class="flex items-center space-x-8">
                        <h1 class="text-2xl font-bold">Schedul⚡</h1>
                        <nav class="flex space-x-6">
                            <a href="#" class="hover:text-blue-200">Home</a>
                            <a href="#" class="bg-gray-600 px-4 py-2 rounded">Event</a>
                            <a href="#" class="hover:text-blue-200">Venue</a>
                            <a href="#" class="text-orange-300">Jadwal</a>
                        </nav>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span>User - 2007</span>
                        <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-sm"></i>
                        </div>
                        <button onclick="closeModal()" class="ml-4 text-white hover:text-gray-300">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Event Detail Content -->
                <div class="p-6">
                    <!-- Event Banner -->
                    <div class="mb-6 relative">
                        <div class="bg-gradient-to-r from-teal-600 to-blue-600 rounded-lg p-8 text-white relative overflow-hidden">
                            <div class="absolute top-4 left-4 flex space-x-2">
                                <div class="w-8 h-8 bg-white rounded-full"></div>
                                <div class="w-8 h-8 bg-yellow-400 rounded-full"></div>
                                <div class="w-8 h-8 bg-blue-400 rounded-full"></div>
                            </div>
                            <div class="absolute top-4 right-4">
                                <div class="bg-orange-500 text-white px-3 py-1 rounded text-sm font-bold">
                                    FASILKOM
                                    <span class="text-yellow-300">Unej!</span>
                                </div>
                            </div>
                            <div class="text-center mt-8">
                                <div class="bg-blue-500 text-white px-4 py-2 rounded-lg inline-block mb-4">
                                    SOSIALISASI
                                </div>
                                <h1 class="text-4xl font-bold mb-2">PROGRAM</h1>
                                <h2 class="text-3xl font-light mb-2">PEMBINAAN MAHASISWA</h2>
                                <h2 class="text-3xl font-light">WIRAUSAHA (P2MW) <span class="font-bold">2024</span></h2>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Kegiatan -->
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h2 class="text-xl font-bold text-center mb-6">Detail Kegiatan</h2>

                        <div class="mb-6">
                            <p class="text-lg mb-4"><strong>Nama Kegiatan :</strong> Pembinaan Mahasiswa Wirausaha(P2MW)</p>

                            <!-- Stats -->
                            <div class="grid grid-cols-3 gap-4 mb-6">
                                <div class="bg-blue-600 text-white rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold">100</div>
                                    <div class="text-sm">Kuota :</div>
                                </div>
                                <div class="bg-blue-600 text-white rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold">50</div>
                                    <div class="text-sm">Terdaftar :</div>
                                </div>
                                <div class="bg-blue-600 text-white rounded-lg p-4 text-center">
                                    <div class="text-2xl font-bold">50</div>
                                    <div class="text-sm">Tersedia :</div>
                                </div>
                            </div>

                            <!-- Jadwal -->
                            <div class="bg-white rounded-lg p-4 mb-6">
                                <h3 class="font-bold text-lg mb-4">Jadwal</h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <strong>Tanggal Event :</strong> 24 Januari - 24 Januari
                                    </div>
                                    <div>
                                        <strong>Batas Daftar & Bayar :</strong> 10 Desember - 20 Januari
                                    </div>
                                </div>
                            </div>

                            <!-- Content Grid -->
                            <div class="grid grid-cols-2 gap-6">
                                <!-- Left Column -->
                                <div class="space-y-6">
                                    <!-- Narasumber -->
                                    <div class="bg-white rounded-lg p-4">
                                        <h3 class="font-bold text-lg mb-3">Narasumber :</h3>
                                        <ul class="text-sm space-y-1">
                                            <li>• Fahrobby Adnan S.Kom., M., MSI</li>
                                            <li>• Jacob Win S.T., S.Kom., M.Kom., Acc</li>
                                            <li>• Qurrota A' Yuni AR Rumimat, Spd., Msc</li>
                                        </ul>
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="bg-white rounded-lg p-4">
                                        <h3 class="font-bold text-lg mb-3">Deskripsi :</h3>
                                        <p class="text-sm text-gray-600">
                                            P2MW adalah seminar untuk pembinaan mahasiswa di bidang WiraUsaha
                                        </p>
                                    </div>

                                    <!-- Tiket -->
                                    <div class="bg-white rounded-lg p-4">
                                        <h3 class="font-bold text-lg mb-3">Tiket :</h3>
                                        <p class="text-sm">Mahasiswa : Gratis</p>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="bg-white rounded-lg p-4">
                                    <h3 class="font-bold text-lg mb-3">Venue :</h3>
                                    <div class="mb-4">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDMwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMjAwIiBmaWxsPSIjRjNGNEY2Ii8+CjxyZWN0IHg9IjUwIiB5PSI1MCIgd2lkdGg9IjIwMCIgaGVpZ2h0PSIxMDAiIGZpbGw9IiNFNUU3RUIiLz4KPGNpcmNsZSBjeD0iMTUwIiBjeT0iMTAwIiByPSIyMCIgZmlsbD0iIzY0NzQ4QiIvPgo8dGV4dCB4PSIxNTAiIHk9IjE4NSIgZm9udC1zaXplPSIxMiIgZmlsbD0iIzM3NDE1MSIgdGV4dC1hbmNob3I9Im1pZGRsZSI+Rm9yIGV4YW1wbGU8L3RleHQ+Cjx0ZXh0IHg9IjE1MCIgeT0iMTk4IiBmb250LXNpemU9IjEwIiBmaWxsPSIjNjU3Mzg2IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5WZXJ5IGltcG9ydGFudCBpbmZvcm1hdGlvbjwvdGV4dD4KPC9zdmc+"
                                             alt="Venue"
                                             class="w-full h-32 object-cover rounded">
                                    </div>
                                    <div class="text-sm space-y-2">
                                        <div><strong>Lokasi:</strong> Ruang B1 & B2 Fakultas Ilmu Komputer</div>
                                        <div><strong>Keterangan:</strong> Offline</div>
                                        <div><strong>Tautan Zoom:</strong> -</div>
                                        <div><strong>Contact Person:</strong> +62 674 6754 6512</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-blue-600 text-white p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-star text-red-600"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold mb-1">UNIVERSITAS JEMBER</h3>
                                <div class="text-xs space-y-1">
                                    <p>Kampus Jember: Jl. Kalimantan Tegalboto No.37 Krajan Timur, Sumbersari, Kec. Sumbersari, Kabupaten Jember.</p>
                                    <p>Kampus Bondowoso: Jl. Diponegoro 156 Diponegoro, Tegalsari, Damai, Bondowoso, Kabupaten Bondowoso.</p>
                                    <p>Kampus Lumajang: Jl. Brigjen Katamso, Tempokersari, Lumajang.</p>
                                    <p>Kampus Pasuruan: Jl. KH. Mansyur No.207, Tembokrejo, Kec. Pasuruan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-right text-sm">
                            <h4 class="font-semibold mb-2">More About us :</h4>
                            <div class="space-y-1">
                                <p><i class="fas fa-globe mr-2"></i> unej.ac.id</p>
                                <p><i class="fab fa-facebook mr-2"></i> Universitas Jember</p>
                                <p><i class="fab fa-instagram mr-2"></i> @unej_jember</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Show modal
            document.getElementById('eventModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('eventModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('eventModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });

        function performSearch() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const eventCards = document.querySelectorAll('.event-card');

            eventCards.forEach(card => {
                const eventTitle = card.querySelector('h3').textContent.toLowerCase();
                if (eventTitle.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>
