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

<body class="bg-gray-50">
    <!-- Header -->
    <x-header />

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
                <div class="bg-primary-blue text-white p-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Schedulo Logo" class="h-8 w-auto">
                        <div class="ml-2 w-6 h-6 bg-white rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-primary-blue text-sm"></i>
                        </div>
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
                        <img src="{{ asset('img/kegiatan1.jpg') }}" alt=""
                            class="w-full h-auto rounded-lg shadow-lg">
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
                                        <img src="{{ asset('img/AuditFasilkom.png') }}" alt="Venue Image"
                                             class="w-full h-32 object-cover rounded">
                                    </div>
                                    <div class="text-sm space-y-2">
                                        <div><strong>Lokasi:</strong> Auditorium Lt. 5 Fakultas Ilmu Komputer</div>
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
                <x-footer />
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
