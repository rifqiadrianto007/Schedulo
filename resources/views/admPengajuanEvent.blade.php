@extends('layouts.admin') {{-- Sesuaikan jika pakai layout lain --}}

@section('content')
<div class="bg-white rounded-lg p-6 shadow-sm">
    <h1 class="text-2xl font-bold text-blue-700 mb-6">Event</h1>

    @foreach ($events as $event)
        @if (in_array($event->status, ['Belum Disetujui', 'Revisi']))
        <div class="flex items-center justify-between bg-gray-100 rounded-lg px-4 py-3 mb-4 shadow">
            <div class="text-lg font-semibold text-gray-800">
                {{ $event->nama_kegiatan }}
            </div>

            <div class="flex space-x-2">
                {{-- Badge Status --}}
                @if ($event->status === 'Belum Disetujui')
                    <span class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Belum Disetujui
                    </span>
                @elseif ($event->status === 'Revisi')
                    <span class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Revisi
                    </span>
                @endif

                {{-- Tombol Detail --}}
                <a href="{{ route('form.dataEvent', ['id' => $event->id]) }}"
                   class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                    Detail
                </a>
            </div>
        </div>
        @endif
    @endforeach

    @if ($events->whereIn('status', ['Belum Disetujui', 'Revisi'])->isEmpty())
        <p class="text-gray-500">Tidak ada event yang menunggu persetujuan.</p>
    @endif
</div>
@endsection
