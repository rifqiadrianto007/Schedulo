@extends('layouts.app')

@section('content')
    <main class="max-w-4xl mx-auto py-10 px-4">
        <div class="bg-white shadow rounded-lg p-6">
            <img src="{{ asset('storage/' . $event->poster) }}" class="w-full h-60 object-cover rounded mb-6">

            <h1 class="text-2xl font-bold mb-4">{{ $event->nama_kegiatan }}</h1>

            <div class="mb-2 text-sm text-gray-600">
                <strong>Tanggal Pelaksanaan:</strong>
                {{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('d M Y') }}
            </div>

            <div class="mb-2 text-sm text-gray-600">
                <strong>Tempat:</strong> {{ $event->tempat_kegiatan }}
            </div>

            <div class="mb-2 text-sm text-gray-600">
                <strong>Deskripsi:</strong>
                <p class="mt-1">{{ $event->deskripsi }}</p>
            </div>

            <div class="mt-6">
                <a href="{{ $event->link_form }}" target="_blank"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </main>
@endsection
