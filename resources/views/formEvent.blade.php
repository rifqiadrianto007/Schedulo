@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Form Pengajuan Event</h1>

            <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Nama Ketua Pelaksana -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Ketua Pelaksana :
                    </label>
                    <input type="text" name="nama_pelaksana"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                </div>

                <!-- NIM/NIP -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        NIM/NIP :
                    </label>
                    <input type="text" name="nim_nip"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                </div>

                <!-- Nama Kegiatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Kegiatan :
                    </label>
                    <input type="text" name="nama_kegiatan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                </div>

                <!-- Jenis Kegiatan & Narasumber -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Kegiatan :
                        </label>
                        <select name="jenis_kegiatan"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                            <option value="Seminar">Seminar</option>
                            <option value="workshop">Workshop</option>
                            <option value="konferensi">Konferensi</option>
                            <option value="pelatihan">Pelatihan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Narasumber/Pemateri :
                        </label>
                        <input type="text" name="narasumber_pemateri"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                    </div>
                </div>

                <!-- Tanggal Dilaksanakan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Dilaksanakan :
                    </label>
                    <div class="relative">
                        <input type="date" id="tanggal-dilaksanakan" name="tanggal_pelaksanaan"
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
                        <select name="tempat_kegiatan"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                            <option value="Ruang Kuliah B1 & B2">Ruang Kuliah B1 & B2</option>
                            <option value="Aula Utama">Aula Utama</option>
                            <option value="Laboratorium">Laboratorium</option>
                            <option value="Online">Online</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Link Zoom :
                        </label>
                        <input type="url" name="link_zoom"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                    </div>
                </div>

                <!-- Biaya Pendaftaran -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Biaya Pendaftaran :
                    </label>
                    <input type="text" placeholder="Kosongi Jika Gratis" name="biaya_pendaftaran"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-100 text-gray-600 placeholder-gray-400">
                </div>

                <!-- Tenggat Pendaftaran, Link Form, Link Sheet -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tenggat Pendaftaran
                        </label>
                        <div class="relative">
                            <input type="date" id="tenggat-pendaftaran" name="tenggat_pendaftaran"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                            <i class="fas fa-calendar-alt absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Link Form :
                        </label>
                        <input type="url" placeholder="Isi Link Form" name="link_form"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 placeholder-gray-400">
                    </div>
                </div>

                <!-- Kuota -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kuota :
                    </label>
                    <input type="number" name="kuota"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50">
                </div>

                <!-- Deskripsi Kegiatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Kegiatan :
                    </label>
                    <textarea rows="4" name="deskripsi"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 resize-none"></textarea>
                </div>

                <!-- Poster Kegiatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Poster Kegiatan :</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer"
                        onclick="document.getElementById('poster-upload').click()">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                        <p class="text-gray-500 mb-2">Pilih file</p>
                        <span class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors text-sm">
                            Browse Files
                        </span>
                        <p id="file-name" class="text-sm text-gray-700 mt-2">No file chosen</p>
                        <input type="file" accept="image/*" id="poster-upload" name="poster" class="hidden" onchange="previewFileName(event)">
                        <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG, GIF (Max: 5MB)</p>
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
                        <input type="tel" placeholder="8123456789" name="contact"
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
            <script>
                function previewFileName(event) {
                    const file = event.target.files[0];
                    if (file) {
                        document.getElementById('file-name').textContent = "File dipilih: " + file.name;
                    } else {
                        document.getElementById('file-name').textContent = "Tidak ada file dipilih.";
                    }
                }
            </script>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('js/form-event.js') }}"></script>
@endpush
