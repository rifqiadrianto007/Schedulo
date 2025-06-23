<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Schedulo
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/event.js']) --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap" rel="stylesheet" />
</head>

<body class="bg-gray-300 font-sans">
    <!-- Header -->
    <x-admHeader />

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <x-admSidebar />

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-blue-600">Event</h2>
                    <a href="{{ route('admPengajuanEvent') }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black font-medium px-6 py-2 rounded-lg transition">
                        Event Diajukan
                    </a>
                </div>

                @if(isset($events) && $events->count())
                    <div class="space-y-4">
                        @foreach($events as $event)
                            <div class="bg-gray-100 rounded-lg p-4 flex justify-between items-center shadow-sm">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $event->nama_kegiatan }}</h3>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('event.detailAdm', $event->id) }}"
                                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition">
                                        Detail
                                    </a>

                                    <form action="{{ route('admEventDelete', $event->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus event ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">Belum ada event yang disetujui.</p>
                @endif
            </div>
        </main>
    </div>
</body>

</html>
