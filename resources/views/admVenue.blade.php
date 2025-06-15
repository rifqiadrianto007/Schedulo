<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Schedulo
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/event.js']) --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap" rel="stylesheet" />
</head>

<body class="bg-gray-300 font-sans">
    <!-- Header -->
    <x-admHeader />

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <x-admSidebar />

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <!-- Header Section -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-blue-600">Venue</h2>
                    <a href="{{ route('admVenue.tambah') }}">
                        <button class="bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-2 rounded-lg transition-colors">
                            Tambah
                        </button>
                    </a>
                </div>

                <!-- Venues List -->
                <div class="space-y-4">
                    @foreach($venues as $venue)
                        <div
                            class="bg-gray-200 rounded-lg p-4 flex justify-between items-center cursor-pointer hover:bg-gray-300 transition"
                            data-nama="{{ $venue->nama_tempat }}"
                            data-alamat="{{ $venue->alamat }}"
                            data-fasilitas="{{ $venue->fasilitas }}"
                            data-ketentuan="{{ $venue->ketentuan }}"
                            data-gambar="{{ $venue->gambar_venue }}"
                            onclick="openModal(this)"
                        >
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $venue->nama_tempat }}</h3>
                            </div>
                            <div class="flex items-center space-x-3">
                                <button onclick="event.stopPropagation(); window.location.href='{{ route('admVenue.edit', $venue->id) }}'"
                                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                    Edit
                                </button>
                                <button onclick="event.stopPropagation(); deleteVenue({{ $venue->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Modal -->
                <div id="venueModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50 p-4">
                    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden w-full max-w-3xl">
                        <!-- Gambar -->
                        <div class="relative">
                            <img id="modalGambar" src="" class="w-full h-64 object-cover rounded-t-2xl" />
                            <button class="absolute top-4 right-4 bg-white text-gray-600 rounded-full w-10 h-10 flex items-center justify-center shadow-md" onclick="closeModal()">
                                <i class="fas fa-times text-lg"></i>
                            </button>
                        </div>

                        <!-- Konten -->
                        <div class="p-6">
                            <h2 id="modalNama" class="text-2xl font-bold text-center mb-2"></h2>
                            <p id="modalAlamat" class="text-center text-gray-600 mb-6"></p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="border rounded-lg p-4">
                                    <h3 class="font-semibold mb-3">Fasilitas :</h3>
                                    <ul id="modalFasilitasList" class="list-disc list-inside text-gray-700"></ul>
                                </div>
                                <div class="border rounded-lg p-4">
                                    <h3 class="font-semibold mb-3">Ketentuan :</h3>
                                    <ul id="modalKetentuanList" class="list-disc list-inside text-gray-700"></ul>
                                </div>
                            </div>

                            <div class="flex justify-center mt-8">
                                <button onclick="closeModal()" class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-8 py-3 rounded-lg shadow">
                                    Kembali
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function openModal(element) {
                    document.getElementById('modalNama').innerText = element.dataset.nama;
                    document.getElementById('modalAlamat').innerText = element.dataset.alamat;

                    // Split fasilitas
                    let fasilitas = element.dataset.fasilitas.split(',');
                    let fasilitasList = document.getElementById('modalFasilitasList');
                    fasilitasList.innerHTML = '';
                    fasilitas.forEach(item => {
                        let li = document.createElement('li');
                        li.textContent = item.trim();
                        fasilitasList.appendChild(li);
                    });

                    // Split ketentuan
                    let ketentuan = element.dataset.ketentuan.split(',');
                    let ketentuanList = document.getElementById('modalKetentuanList');
                    ketentuanList.innerHTML = '';
                    ketentuan.forEach(item => {
                        let li = document.createElement('li');
                        li.textContent = item.trim();
                        ketentuanList.appendChild(li);
                    });

                    document.getElementById('modalGambar').src = '/storage/' + element.dataset.gambar;

                    document.getElementById('venueModal').classList.remove('hidden');
                }

                function closeModal() {
                    document.getElementById('venueModal').classList.add('hidden');
                }

                function deleteVenue(id) {
                    if (confirm("Yakin ingin menghapus venue ini?")) {
                        fetch(`/admVenue/delete/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert(data.message); 
                            location.reload();
                        })
                        .catch(error => {
                            console.error(error);
                            alert("Terjadi kesalahan.");
                        });
                    }
                }
                </script>
            </div>
        </main>
    </div>
</body>

</html>
