@extends('layouts.admin', ['bodyClass' => 'font-sans bg-gray-50 min-h-screen flex flex-col'])

@section('content')
<div class="max-w-5xl mx-auto mt-8 bg-white p-6 rounded shadow">

    <form action="{{ route('event.detailAdm', $event->id) }}" method="POST">
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
        </div>
    </form>
</div>
@endsection
