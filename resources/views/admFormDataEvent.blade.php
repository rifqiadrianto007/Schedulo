@extends('layouts.admin', ['bodyClass' => 'font-sans bg-gray-50 min-h-screen flex flex-col'])

@section('content')
<div class="max-w-5xl mx-auto mt-8 bg-white p-6 rounded shadow">

    {{-- Form Setujui dan Tolak --}}
    <form action="{{ route('event.updateStatus', $event->id) }}" method="POST">
        @csrf

        <div class="space-y-4">
            <div>
                <label class="block font-semibold">Nama Ketua Pelaksana:</label>
                <input type="text" value="{{ $event->nama_pelaksana }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
            </div>

            <div>
                <label class="block font-semibold">NIM/NIP:</label>
                <input type="text" value="{{ $event->nim_nip }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
            </div>

            <div>
                <label class="block font-semibold">Nama Kegiatan:</label>
                <input type="text" value="{{ $event->nama_kegiatan }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
            </div>

            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="block font-semibold">Jenis Kegiatan:</label>
                    <input type="text" value="{{ $event->jenis_kegiatan }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
                </div>
                <div class="flex-1">
                    <label class="block font-semibold">Narasumber/Pemateri:</label>
                    <input type="text" value="{{ $event->narasumber_pemateri }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
                </div>
            </div>

            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="block font-semibold">Tanggal Dilaksanakan:</label>
                    <input type="text" value="{{ $event->tanggal_pelaksanaan }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
                </div>
                <div class="flex-1">
                    <label class="block font-semibold">Tempat Kegiatan:</label>
                    <input type="text" value="{{ $event->tempat_kegiatan }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
                </div>
            </div>

            <div>
                <label class="block font-semibold">Biaya Pendaftaran:</label>
                <input type="text" value="{{ $event->biaya_pendaftaran }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
            </div>

            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="block font-semibold">Tenggat Pendaftaran:</label>
                    <input type="text" value="{{ $event->tenggat_pendaftaran }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
                </div>
                <div class="flex-1">
                    <label class="block font-semibold">Link Form:</label>
                    <input type="text" value="{{ $event->link_form }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
                </div>
            </div>

            <div>
                <label class="block font-semibold">Kuota:</label>
                <input type="text" value="{{ $event->kuota }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
            </div>

            <div>
                <label class="block font-semibold">Deskripsi Kegiatan:</label>
                <textarea disabled class="w-full bg-gray-200 rounded px-4 py-2 resize-none">{{ $event->deskripsi }}</textarea>
            </div>

            <div class="mb-4">
                <h3 class="font-semibold text-gray-700">Poster Kegiatan:</h3>
                <img src="{{ asset('storage/' . $event->poster) }}" alt="Poster Kegiatan" class="mt-2 rounded shadow-lg max-w-md">
            </div>

            <div>
                <label class="block font-semibold">Contact Person:</label>
                <input type="text" value="{{ $event->contact }}" disabled class="w-full bg-gray-200 rounded px-4 py-2">
            </div>

            {{-- Tombol Setujui & Tolak --}}
            <div class="flex justify-end mt-6 space-x-4">
                <button type="submit" name="status" value="Disetujui"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded">
                    Setujui Event
                </button>
                <button type="submit" name="status" value="Ditolak"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded">
                    Tolak Event
                </button>
            </div>
        </div>
    </form>

    {{-- Tombol Minta Revisi --}}
    <div x-data="{ openModal: false }" class="mt-4 text-right">
        <button
            @click="openModal = true"
            class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-4 py-2 rounded-md">
            Minta Revisi
        </button>

        {{-- Modal Catatan Revisi --}}
        <div
            x-show="openModal"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-40"
        >
            <div class="bg-white rounded-xl shadow-lg p-6 w-[90%] max-w-md z-50">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Catatan revisi :</h2>
                <form method="POST" action="{{ route('event.updateStatus', $event->id) }}">
                    @csrf
                    <input type="hidden" name="status" value="Revisi">

                    <textarea name="catatan_admin" rows="6" placeholder="Tulis catatan revisi disini"
                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>{{ old('catatan_admin') }}</textarea>

                    <div class="flex justify-between mt-4">
                        <button type="button" @click="openModal = false"
                            class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded-lg">
                            Kembali
                        </button>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                            Kirim Revisi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
