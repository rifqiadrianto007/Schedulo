@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">

    <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-xl shadow">
        @csrf

        <h2 class="text-2xl font-semibold text-center mb-6">Edit Event</h2>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Pelaksana</label>
            <input type="text" name="nama_pelaksana" value="{{ old('nama_pelaksana', $event->nama_pelaksana) }}" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">NIM / NIP</label>
            <input type="text" name="nim_nip" value="{{ old('nim_nip', $event->nim_nip) }}" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan', $event->nama_kegiatan) }}" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kegiatan</label>
            <select name="jenis_kegiatan" class="w-full border-gray-300 rounded-md shadow-sm">
                @foreach(['Seminar', 'Workshop', 'Konferensi', 'Pelatihan'] as $jenis)
                    <option value="{{ $jenis }}" {{ $event->jenis_kegiatan === $jenis ? 'selected' : '' }}>{{ ucfirst($jenis) }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Narasumber / Pemateri</label>
            <input type="text" name="narasumber_pemateri" value="{{ old('narasumber_pemateri', $event->narasumber_pemateri) }}" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pelaksanaan</label>
            <input type="datetime-local" name="tanggal_pelaksanaan" value="{{ old('tanggal_pelaksanaan', \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('Y-m-d\TH:i')) }}" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tempat Kegiatan</label>
            <select name="tempat_kegiatan" class="w-full border-gray-300 rounded-md shadow-sm">
                @foreach(['Ruang kuliah B1 & B2', 'Aula utama', 'Laboratorium', 'Online'] as $tempat)
                    <option value="{{ $tempat }}" {{ $event->tempat_kegiatan === $tempat ? 'selected' : '' }}>{{ $tempat }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Link Zoom (Opsional)</label>
            <input type="url" name="link_zoom" value="{{ old('link_zoom', $event->link_zoom) }}" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Biaya Pendaftaran</label>
            <input type="number" name="biaya_pendaftaran" value="{{ old('biaya_pendaftaran', $event->biaya_pendaftaran) }}" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tenggat Pendaftaran</label>
            <input type="datetime-local" name="tenggat_pendaftaran" value="{{ old('tenggat_pendaftaran', \Carbon\Carbon::parse($event->tenggat_pendaftaran)->format('Y-m-d\TH:i')) }}" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Link Formulir Pendaftaran</label>
            <input type="url" name="link_form" value="{{ old('link_form', $event->link_form) }}" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Kuota Peserta</label>
            <input type="number" name="kuota" value="{{ old('kuota', $event->kuota) }}" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi', $event->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Contact Person</label>
            <input type="text" name="contact" value="{{ old('contact', $event->contact) }}" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Poster Baru</label>
            <label for="poster" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md cursor-pointer hover:bg-blue-700">
                Pilih File
            </label>
            <input id="poster" type="file" name="poster">
            @if ($event->poster)
                <img src="{{ asset('storage/' . $event->poster) }}" alt="Poster" class="w-32 mt-2">
            @endif
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">Simpan Perubahan</button>
        </div>
    </form>
    @if ($event->catatan_admin)
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded mb-6">
            <strong>Catatan dari Admin:</strong><br>
            {{ $event->catatan_admin }}
        </div>
    @endif
</div>
@endsection
