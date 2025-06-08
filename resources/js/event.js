function showEventDetail() {
// Load detail event content
const modalContent = document.getElementById('modalContent');
modalContent.innerHTML = `
<!-- Header -->
<div class="bg-primary-blue text-white p-4 flex justify-between items-center">
    <div class="flex items-center">
        <img src="{{ asset('img/logo.png') }}" alt="Schedulo Logo" class="h-8 w-auto">
        <div class="ml-2 w-6 h-6 bg-white rounded-full flex items-center justify-center">
            <i class="fas fa-check text-primary-blue text-sm"></i>
        </div>
    </div>
    <div class="flex items-center space-x-4">
        <span>User - 2007</span>
        <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center">
            <i class="fas fa-user text-sm"></i>
        </div>
        <button onclick="closeModal()" class="ml-4 text-white hover:text-gray-300">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>
</div>

<!-- Event Detail Content -->
<div class="p-6">
    <!-- Event Banner -->
    <div class="mb-6 relative">
        <img src="{{ asset('img/kegiatan1.jpg') }}" alt="" class="w-full h-auto rounded-lg shadow-lg">
    </div>

    <!-- Detail Kegiatan -->
    <div class="bg-gray-50 rounded-lg p-6">
        <h2 class="text-xl font-bold text-center mb-6">Detail Kegiatan</h2>

        <div class="mb-6">
            <p class="text-lg mb-4"><strong>Nama Kegiatan :</strong> Pembinaan Mahasiswa Wirausaha(P2MW)</p>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="bg-blue-600 text-white rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold">100</div>
                    <div class="text-sm">Kuota :</div>
                </div>
                <div class="bg-blue-600 text-white rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold">50</div>
                    <div class="text-sm">Terdaftar :</div>
                </div>
                <div class="bg-blue-600 text-white rounded-lg p-4 text-center">
                    <div class="text-2xl font-bold">50</div>
                    <div class="text-sm">Tersedia :</div>
                </div>
            </div>

            <!-- Jadwal -->
            <div class="bg-white rounded-lg p-4 mb-6">
                <h3 class="font-bold text-lg mb-4">Jadwal</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <strong>Tanggal Event :</strong> 24 Januari - 24 Januari
                    </div>
                    <div>
                        <strong>Batas Daftar & Bayar :</strong> 10 Desember - 20 Januari
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Narasumber -->
                    <div class="bg-white rounded-lg p-4">
                        <h3 class="font-bold text-lg mb-3">Narasumber :</h3>
                        <ul class="text-sm space-y-1">
                            <li>• Fahrobby Adnan S.Kom., M., MSI</li>
                            <li>• Jacob Win S.T., S.Kom., M.Kom., Acc</li>
                            <li>• Qurrota A' Yuni AR Rumimat, Spd., Msc</li>
                        </ul>
                    </div>

                    <!-- Deskripsi -->
                    <div class="bg-white rounded-lg p-4">
                        <h3 class="font-bold text-lg mb-3">Deskripsi :</h3>
                        <p class="text-sm text-gray-600">
                            P2MW adalah seminar untuk pembinaan mahasiswa di bidang WiraUsaha
                        </p>
                    </div>

                    <!-- Tiket -->
                    <div class="bg-white rounded-lg p-4">
                        <h3 class="font-bold text-lg mb-3">Tiket :</h3>
                        <p class="text-sm">Mahasiswa : Gratis</p>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="bg-white rounded-lg p-4">
                    <h3 class="font-bold text-lg mb-3">Venue :</h3>
                    <div class="mb-4">
                        <img src="{{ asset('img/AuditFasilkom.png') }}" alt="Venue Image"
                            class="w-full h-32 object-cover rounded">
                    </div>
                    <div class="text-sm space-y-2">
                        <div><strong>Lokasi:</strong> Auditorium Lt. 5 Fakultas Ilmu Komputer</div>
                        <div><strong>Keterangan:</strong> Offline</div>
                        <div><strong>Tautan Zoom:</strong> -</div>
                        <div><strong>Contact Person:</strong> +62 674 6754 6512</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<x-footer />
`;

// Show modal
document.getElementById('eventModal').classList.remove('hidden');
}

function closeModal() {
document.getElementById('eventModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('eventModal').addEventListener('click', function(e) {
if (e.target === this) {
closeModal();
}
});

// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function(e) {
if (e.key === 'Enter') {
performSearch();
}
});

function performSearch() {
const searchTerm = document.getElementById('searchInput').value.toLowerCase();
const eventCards = document.querySelectorAll('.event-card');

eventCards.forEach(card => {
const eventTitle = card.querySelector('h3').textContent.toLowerCase();
if (eventTitle.includes(searchTerm)) {
card.style.display = 'block';
} else {
card.style.display = 'none';
}
});
}
