@extends('layouts.admin', ['bodyClass' => 'font-sans bg-gray-50 min-h-screen flex flex-col'])

@section('content')
<body class="bg-[#e8eef2] min-h-screen flex flex-col">

    <main class="flex-grow flex flex-col justify-center items-center px-4">
        <h2 class="text-blue-700 font-bold text-3xl mb-8">Tambah Venue</h2>
        <form class="w-full max-w-md space-y-4" method="POST" action="{{ route('venue.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-lg font-semibold mb-2">Nama Tempat:</label>
                <input name="nama_tempat" type="text" placeholder="Nama Venue"
                    class="w-full p-3 rounded-md border border-gray-400 focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-lg font-semibold mb-2">Alamat:</label>
                <input name="alamat" type="text" placeholder="Alamat Venue"
                    class="w-full p-3 rounded-md border border-gray-400 focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-lg font-semibold mb-2">Fasilitas:</label>
                <textarea name="fasilitas" placeholder="Masukkan fasilitas. Contoh: Air Conditioner (2), Kursi Lipat (150), Proyektor"
                    class="w-full p-3 rounded-md border border-gray-400 focus:ring-2 focus:ring-blue-500" rows="3" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-lg font-semibold mb-2">Ketentuan:</label>
                <textarea name="ketentuan" placeholder="Masukkan ketentuan. Contoh: Maksimal 170 orang, Alat tanggung jawab penyewa"
                    class="w-full p-3 rounded-md border border-gray-400 focus:ring-2 focus:ring-blue-500" rows="3" required></textarea>
            </div>

            <div class="mb-6">
                <label class="block text-lg font-semibold mb-2">Gambar Venue:</label>
                <input name="gambar_venue" type="file" accept="image/*"
                    class="w-full p-3 border border-gray-400 rounded-md bg-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-lg text-lg transition-colors">
                    Tambah
                </button>
            </div>
        </form>
    </main>
</body>
@endsection
