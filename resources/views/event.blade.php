@extends('layouts.app')

@section('content')
    <main x-data="eventApp({{ $events->toJson() }})" class="container mx-auto p-6">
        <div class="mb-6">
            <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-4">
                <label class="text-gray-700 font-medium">Cari Event :</label>
                <div class="flex-1 max-w-2xl w-full">
                    <input type="text" x-model="searchQuery"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan kata kunci...">
                </div>
                <div class="flex space-x-2">
                    <button @click="searchEvents()"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                        Search
                    </button>
                    @auth
                        <a href="{{ route('eventStatus') }}"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                            Ajukan Event
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                            Ajukan Event
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Event Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <template x-for="event in paginatedEvents" :key="event.id">
                <div class="bg-white rounded-lg shadow-md overflow-hidden event-card">
                    <img :src="'/storage/' + event.poster" alt="Poster" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2" x-text="event.nama_kegiatan"></h3>
                        <p class="text-blue-600 text-sm mb-4" x-text="formatDate(event.tanggal_pelaksanaan)"></p>
                        <button @click="openModal(event)"
                            class="w-full bg-primary-blue hover:bg-blue-700 text-white py-2 rounded font-medium transition-colors duration-300">
                            Detail
                        </button>
                    </div>
                </div>
            </template>
        </div>

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
            @click.self="closeModal()" x-transition>
            <div class="bg-white rounded-lg shadow-xl w-full max-w-5xl max-h-[95vh] overflow-y-auto border border-gray-300">

                <!-- Poster (Header) -->
                <img :src="'/storage/' + selectedEvent.poster" alt="Poster Event"
                    class="w-full h-48 object-cover rounded-t">

                <div class="p-6">
                    <!-- Judul -->
                    <h2 class="text-xl font-bold text-center mb-2">Detail Kegiatan</h2>
                    <p class="text-left text-gray-700 mb-4">
                        <span class="font-bold text-lg">Nama Kegiatan :</span>
                        <span class="text-lg" x-text="selectedEvent.nama_kegiatan"></span>
                    </p>

                    <!-- Info Kuota -->
                    <div class="flex justify-center mb-6">
                        <div class="bg-blue-100 border border-blue-400 rounded-lg p-3 w-40 text-center">
                            <p class="text-lg font-bold text-blue-700">Kuota :</p>
                            <p class="text-lg font-bold" x-text="selectedEvent.kuota"></p>
                        </div>
                    </div>

                    <!-- Jadwal -->
                    <div class="flex flex-col md:flex-row justify-between border-y border-gray-300 py-2 mb-4 text-base">
                        <div class="mb-2 md:mb-0">
                            <strong class="text-gray-700 text-lg">Tanggal Event:</strong>
                            <span class="text-lg" x-text="formatDate(selectedEvent.tanggal_pelaksanaan)"></span>
                        </div>
                        <div>
                            <strong class="text-gray-700 text-lg">Batas Pendaftaran:</strong>
                            <span class="text-lg" x-text="formatDate(selectedEvent.tenggat_pendaftaran)"></span>
                        </div>
                    </div>

                    <!-- Konten -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <!-- Kiri -->
                        <div class="space-y-4">
                            <!-- Narasumber -->
                            <div class="border border-gray-300 rounded p-4">
                                <p class="font-semibold text-gray-700 mb-2 text-lg">Narasumber:</p>
                                <ul class="list-disc ml-6 text-gray-700 text-lg"
                                    x-html="formatSpeakers(selectedEvent.narasumber_pemateri)"></ul>
                            </div>

                            <!-- Deskripsi -->
                            <div class="border border-gray-300 rounded p-4">
                                <p class="font-bold text-gray-700 mb-2 text-lg">Deskripsi:</p>
                                <p class="text-gray-700 text-lg" x-text="selectedEvent.deskripsi"></p>
                            </div>

                            <!-- Tiket -->
                            <div class="border border-gray-300 rounded p-4">
                                <p class="font-bold text-gray-700 text-lg">Tiket:</p>
                                <p class="text-lg"
                                x-text="selectedEvent.biaya_pendaftaran ? 'Rp. ' + selectedEvent.biaya_pendaftaran : 'Gratis'"></p>
                            </div>

                            <div class="border border-gray-300 rounded p-4">
                                <p class="font-bold text-gray-700 text-lg mb-2">Contact Person:</p>
                                <p class="text-gray-700" x-text="selectedEvent.contact"></p>
                            </div>
                        </div>

                        <!-- Kanan -->
                        <div class="space-y-2">
                            <div class="border border-gray-300 rounded p-4">
                                <p class="font-bold text-gray-700 text-lg mb-2">Venue:</p>
                                <template x-if="selectedEvent.gambar_venue">
                                    <img :src="'/storage/' + selectedEvent.gambar_venue" alt="Venue" class="w-full h-40 object-cover rounded">
                                </template>
                                <template x-if="!selectedEvent.gambar_venue">
                                    <div class="w-full h-40 flex items-center justify-center bg-gray-100 rounded text-gray-400">No Image</div>
                                </template>
                            </div>

                            <div class="border border-gray-300 rounded p-4">
                                <p class="font-bold text-gray-700 text-lg mb-2">Lokasi:</p>
                                <p class="text-gray-700" x-text="selectedEvent.tempat_kegiatan"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-center mt-8">
                        <button @click="closeModal()"
                                class="bg-gray-400 hover:bg-gray-500 text-white px-8 py-2 rounded font-medium transition-colors">
                            Kembali
                        </button>
                        <template x-if="selectedEvent.link_form">
                            <button
                                @click="window.open(selectedEvent.link_form, '_blank')"
                                class="bg-primary-blue hover:bg-blue-700 text-white px-8 py-2 rounded font-medium transition-colors ml-4">
                                Daftar Sekarang
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

<script>
    function eventApp(eventsFromLaravel) {
        return {
            events: eventsFromLaravel,
            searchQuery: '',
            currentPage: 1,
            itemsPerPage: 6,
            selectedEvent: {},
            showModal: false,

            get filteredEvents() {
                if (!this.searchQuery.trim()) return this.events;
                const keyword = this.searchQuery.toLowerCase();
                return this.events.filter(e => e.nama_kegiatan.toLowerCase().includes(keyword));
            },

            get paginatedEvents() {
                const start = (this.currentPage - 1) * this.itemsPerPage;
                return this.filteredEvents.slice(start, start + this.itemsPerPage);
            },

            formatSpeakers(text) {
                if (!text) return '';
                return text
                    .split('\n')
                    .map(s => `<li>${s.trim()}</li>`)
                    .join('');
            },

            formatDate(date) {
                return new Date(date).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' });
            },

            searchEvents() {
                this.currentPage = 1;
            },

            openModal(event) {
                fetch(`/event/fetch/${event.id}`)
                    .then(response => response.json())
                    .then(data => {
                        this.selectedEvent = data;
                        this.showModal = true;
                        document.body.style.overflow = 'hidden';
                    })
                    .catch(error => {
                        console.error('Gagal mengambil detail event:', error);
                    });
            },

            closeModal() {
                this.showModal = false;
                document.body.style.overflow = 'auto';
            },
        }
    }
</script>

