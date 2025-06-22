@extends('layouts.admin')

@section('content')
        <main class="flex-1 p-6 overflow-y-auto h-full">
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <div class="text-center py-10">
                    <h2 class="text-4xl font-bold text-blue-600 mb-4">Selamat Datang di Schedulo</h2>
                    <p class="text-xl text-gray-600 mb-8">Sistem Manajemen Event dan Venue</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                        <!-- Events Card -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                            <div class="text-blue-600 mb-4">
                                <i class="fas fa-calendar-alt text-4xl"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-800 mb-2">Kelola Event</h3>
                            <p class="text-gray-600 mb-4">Atur dan kelola semua event dengan mudah dan efisien</p>
                            <a href="{{ route('eventList') }}"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors">
                                Lihat Event
                            </a>
                        </div>

                        <!-- Venues Card -->
                        <div
                            class="bg-green-50 border border-green-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                            <div class="text-green-600 mb-4">
                                <i class="fas fa-map-marked-alt text-4xl"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-800 mb-2">Kelola Venue</h3>
                            <p class="text-gray-600 mb-4">Manajemen lokasi dan tempat untuk berbagai event</p>
                            <a href="{{ route('admVenue') }}"
                                class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition-colors">
                                Lihat Venue
                            </a>
                        </div>
                    </div>

                    <!-- Statistics Section -->
                    <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 max-w-2xl mx-auto">
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <div class="text-yellow-600 text-2xl font-bold">{{ $totalEvent }}</div>
                            <div class="text-gray-600">Total Event</div>
                        </div>
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                            <div class="text-purple-600 text-2xl font-bold">{{ $totalVenue }}</div>
                            <div class="text-gray-600">Total Venue</div>
                        </div>
                        <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4">
                            <div class="text-indigo-600 text-2xl font-bold">{{ $totalAdmin }}</div>
                            <div class="text-gray-600">Admin Aktif</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
