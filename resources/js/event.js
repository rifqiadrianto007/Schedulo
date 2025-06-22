document.addEventListener('DOMContentLoaded', function () {
    window.showEventDetail = function(eventId) {
        fetch(`/api/event/${eventId}`)
            .then(response => response.json())
            .then(event => {
                const modalContent = document.getElementById('modalContent');
                if (!modalContent) return;

                modalContent.innerHTML = `
                    <div class="bg-white p-6 rounded-lg max-w-3xl mx-auto">
                        <h2 class="text-xl font-bold mb-4 text-center">Detail Kegiatan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p><strong>Nama Kegiatan:</strong> ${event.nama_kegiatan}</p>
                                <p><strong>Jenis:</strong> ${event.jenis_kegiatan}</p>
                                <p><strong>Tanggal:</strong> ${event.tanggal_pelaksanaan}</p>
                                <p><strong>Tempat:</strong> ${event.tempat_kegiatan}</p>
                                <p><strong>Zoom:</strong> ${event.link_zoom || '-'}</p>
                            </div>
                            <div>
                                <p><strong>Narasumber:</strong> ${event.narasumber_pemateri || '-'}</p>
                                <p><strong>Biaya:</strong> ${event.biaya_pendaftaran || 'Gratis'}</p>
                                <p><strong>Tenggat Daftar:</strong> ${event.tenggat_pendaftaran}</p>
                                <a href="${event.link_form}" target="_blank" class="block mt-4 text-center bg-blue-600 text-white py-2 rounded-lg">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                `;

                const modal = document.getElementById('eventModal');
                if (modal) modal.classList.remove('hidden');
            })
            .catch(error => console.error('Gagal mengambil data:', error));
    };

    window.closeModal = function() {
        const modal = document.getElementById('eventModal');
        if (modal) modal.classList.add('hidden');
    };

    // Klik di luar modal
    const modal = document.getElementById('eventModal');
    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });
    }
});
