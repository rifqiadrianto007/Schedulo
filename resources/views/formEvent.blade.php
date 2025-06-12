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
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#1e40af',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 font-['Poppins']">
    <!-- Header -->
    <x-header />

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Form Pengajuan Event</h1>

            <form class="space-y-6">
                <!-- Nama Ketua Pelaksana -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Ketua Pelaksana :
                    </label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                </div>

                <!-- NIM/NIP -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        NIM/NIP :
                    </label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                </div>

                <!-- Nama Kegiatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Kegiatan :
                    </label>
                    <input type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                </div>

                <!-- Jenis Kegiatan & Narasumber -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Kegiatan :
                        </label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                            <option value="">Seminar</option>
                            <option value="workshop">Workshop</option>
                            <option value="konferensi">Konferensi</option>
                            <option value="pelatihan">Pelatihan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Narasumber/Pemateri :
                        </label>
                        <input type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                    </div>
                </div>

                <!-- Tanggal Dilaksanakan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Dilaksanakan :
                    </label>
                    <div class="relative">
                        <input type="date"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                        <i class="fas fa-calendar-alt absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
                    </div>
                </div>

                <!-- Tempat Kegiatan & Link Zoom -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tempat Kegiatan :
                        </label>
                        <select
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                            <option value="">Ruang Kuliah B1 & B2</option>
                            <option value="aula">Aula Utama</option>
                            <option value="lab">Laboratorium</option>
                            <option value="online">Online</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Link Zoom :
                        </label>
                        <input type="url"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                    </div>
                </div>

                <!-- Biaya Pendaftaran -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Biaya Pendaftaran :
                    </label>
                    <input type="text" placeholder="Kosongi Jika Gratis"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-100 text-gray-600 placeholder-gray-400">
                </div>

                <!-- Tenggat Pendaftaran, Link Form, Link Sheet -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tenggat Pendaftaran
                        </label>
                        <div class="relative">
                            <input type="date"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                            <i class="fas fa-calendar-alt absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Link Form :
                        </label>
                        <input type="url" placeholder="Isi Link Form"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 placeholder-gray-400">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Link Sheet :
                        </label>
                        <input type="url" placeholder="Isi Link Sheet"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 placeholder-gray-400">
                    </div>
                </div>

                <!-- Kuota -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kuota :
                    </label>
                    <input type="number"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                </div>

                <!-- Deskripsi Kegiatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Kegiatan :
                    </label>
                    <textarea rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 resize-none"></textarea>
                </div>

                <!-- Poster Kegiatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Poster Kegiatan :
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer"
                        onclick="document.getElementById('poster-upload').click()">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                        <p class="text-gray-500 mb-2">Pilih file</p>
                        <input type="file" accept="image/*" class="hidden" id="poster-upload">
                        <span
                            class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors text-sm">
                            Browse Files
                        </span>
                        <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG, GIF (Max: 5MB)</p>
                    </div>
                </div>

                <!-- Surat Izin Kegiatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Surat Izin Kegiatan :
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer"
                        onclick="document.getElementById('surat-upload').click()">
                        <i class="fas fa-file-pdf text-4xl text-gray-400 mb-3"></i>
                        <p class="text-gray-500 mb-2">Pilih file</p>
                        <input type="file" accept=".pdf,.doc,.docx" class="hidden" id="surat-upload">
                        <span
                            class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors text-sm">
                            Browse Files
                        </span>
                        <p class="text-xs text-gray-400 mt-2">Format: PDF, DOC, DOCX (Max: 10MB)</p>
                    </div>
                </div>

                <!-- Contact Person -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Contact Person :
                    </label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 py-2 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            +62
                        </span>
                        <input type="tel" placeholder="8123456789"
                            class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-400">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center pt-6">
                    <button type="submit"
                        class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium shadow-md hover:shadow-lg">
                        Ajukan Event
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <x-footer />

    <script>
        // File upload preview functionality
        document.getElementById('poster-upload').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            const fileSize = e.target.files[0]?.size;
            const parentDiv = e.target.parentElement;
            const textP = parentDiv.querySelector('p');

            if (fileName) {
                if (fileSize > 5 * 1024 * 1024) { // 5MB limit
                    alert('File terlalu besar! Maksimal 5MB');
                    e.target.value = '';
                    return;
                }
                textP.textContent = fileName;
                textP.classList.add('text-green-600', 'font-medium');
                parentDiv.classList.add('border-green-400', 'bg-green-50');
            }
        });

        document.getElementById('surat-upload').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            const fileSize = e.target.files[0]?.size;
            const parentDiv = e.target.parentElement;
            const textP = parentDiv.querySelector('p');

            if (fileName) {
                if (fileSize > 10 * 1024 * 1024) { // 10MB limit
                    alert('File terlalu besar! Maksimal 10MB');
                    e.target.value = '';
                    return;
                }
                textP.textContent = fileName;
                textP.classList.add('text-green-600', 'font-medium');
                parentDiv.classList.add('border-green-400', 'bg-green-50');
            }
        });

        // Form validation and submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Basic validation
            const requiredFields = [
                'input[type="text"]',
                'select',
                'input[type="date"]',
                'textarea'
            ];

            let isValid = true;
            const formData = new FormData();

            // Check required fields
            requiredFields.forEach(selector => {
                const fields = document.querySelectorAll(selector);
                fields.forEach(field => {
                    if (!field.value.trim() && field.name !== 'biaya_pendaftaran') {
                        field.classList.add('border-red-500');
                        isValid = false;
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });
            });

            if (!isValid) {
                alert('Mohon lengkapi semua field yang diperlukan!');
                return;
            }

            // Show success message
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Mengajukan...';
            submitBtn.classList.add('opacity-75');

            setTimeout(() => {
                alert('Event berhasil diajukan! Menunggu persetujuan admin.');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Ajukan Event';
                submitBtn.classList.remove('opacity-75');
            }, 2000);
        });

        // Mobile menu toggle (for responsive design)
        function toggleMobileMenu() {
            const nav = document.querySelector('nav');
            nav.classList.toggle('hidden');
        }
    </script>
</body>

</html>
