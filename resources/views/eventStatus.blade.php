@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <aside class="w-64 bg-white shadow-lg border-r border-gray-200">
            <div class="mt-8 flex flex-col items-center space-y-3">
                <a href="{{ route('form.event') }}" class="w-40 px-4 py-2 bg-blue-600 text-white rounded text-center hover:bg-blue-700">Ajukan Event</a>
            </div>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Daftar Event</h2>

        @foreach ($events as $event)
            <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-5 flex items-center justify-between mt-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">{{ $event->nama_kegiatan }}</h3>
                    @php
                        $status = $event->status;
                        $color = match($status) {
                            'Disetujui' => 'bg-green-500',
                            'Ditolak' => 'bg-red-600',
                            'Revisi' => 'bg-yellow-400 text-black',
                            default => 'bg-gray-400',
                        };
                    @endphp

                    <span class="inline-block {{ $color }} text-white text-xs px-2 py-1 rounded mt-2">
                        {{ $status ?? 'Belum Disetujui' }}
                    </span>
                </div>

                <a href="{{ route('event.edit', $event->id) }}"
                   class="bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded transition">
                    Edit
                </a>
            </div>
        @endforeach
    </main>
</div>
@endsection
