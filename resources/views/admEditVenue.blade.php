@extends('layouts.app')

@section('content')
<body class="bg-[#e8eef2] min-h-screen flex flex-col">
    <header class="bg-[#1e5ebd] p-4 flex items-center">
        <img alt="Schedulo logo" class="mr-2" height="40"
            src="https://storage.googleapis.com/a1aa/image/b0117f03-b472-499c-a2db-a3952f5e027e.jpg" width="40" />
        <h1 class="text-white font-extrabold text-xl underline decoration-white decoration-4">
            Schedulo
            <span class="inline-block align-middle">
                <svg class="inline-block" fill="none" height="24" stroke="white" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
            </span>
            <span class="sr-only">o</span>
        </h1>
    </header>

    <main class="flex-grow flex flex-col justify-center items-center px-4">
        <h2 class="text-blue-700 font-bold text-3xl mb-8">Edit Venue</h2>
        <form class="w-full max-w-md space-y-4" method="POST" action="{{ route('admVenue.update', $venue->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-lg font-semibold mb-2">Nama Tempat:</label>
                <input name="nama_tempat" type="text" value="{{ $venue->nama_tempat }}"
                    class="w-full p-3 rounded-md border border-gray-400 focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-lg font-semibold mb-2">Alamat:</label>
                <input name="alamat" type="text" value="{{ $venue->alamat }}"
                    class="w-full p-3 rounded-md border border-gray-400 focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-lg font-semibold mb-2">Fasilitas:</label>
                <textarea name="fasilitas" class="w-full p-3 rounded-md border border-gray-400 focus:ring-2 focus:ring-blue-500" rows="3" required>{{ $venue->fasilitas }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-lg font-semibold mb-2">Ketentuan:</label>
                <textarea name="ketentuan" class="w-full p-3 rounded-md border border-gray-400 focus:ring-2 focus:ring-blue-500" rows="3" required>{{ $venue->ketentuan }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-lg font-semibold mb-2">Gambar Venue (Biarkan kosong jika tidak ingin ganti):</label>
                <input name="gambar_venue" type="file" accept="image/*"
                    class="w-full p-3 border border-gray-400 rounded-md bg-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-lg text-lg transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </main>
</body>
@endsection
