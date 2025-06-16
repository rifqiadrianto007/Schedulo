@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg p-6 shadow-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-blue-600">Venue</h2>
        <a href="{{ route('admVenue.tambah') }}">
            <button class="bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-2 rounded-lg transition-colors">
                Tambah
            </button>
        </a>
    </div>

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

    <div id="venueModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50 p-4">
        <div id="modalContent" class="bg-white rounded-2xl shadow-2xl overflow-hidden w-full max-w-3xl relative">
            <div class="relative">
                <img id="modalGambar" src="" class="w-full h-64 object-cover rounded-t-2xl" />
                <button id="closeButton" class="absolute top-4 right-4 bg-white text-gray-600 rounded-full w-10 h-10 flex items-center justify-center shadow-md">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

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
                    <button id="btnCloseModal" class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-8 py-3 rounded-lg shadow">
                        Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/admVenue.js') }}"></script>
@endpush
