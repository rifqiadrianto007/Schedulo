const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
function openModal(element) {
    document.getElementById('modalNama').innerText = element.dataset.nama;
    document.getElementById('modalAlamat').innerText = element.dataset.alamat;

    let fasilitas = element.dataset.fasilitas.split(',');
    let fasilitasList = document.getElementById('modalFasilitasList');
    fasilitasList.innerHTML = '';
    fasilitas.forEach(item => {
        let li = document.createElement('li');
        li.textContent = item.trim();
        fasilitasList.appendChild(li);
    });

    let ketentuan = element.dataset.ketentuan.split(',');
    let ketentuanList = document.getElementById('modalKetentuanList');
    ketentuanList.innerHTML = '';
    ketentuan.forEach(item => {
        let li = document.createElement('li');
        li.textContent = item.trim();
        ketentuanList.appendChild(li);
    });

    document.getElementById('modalGambar').src = '/storage/' + element.dataset.gambar;
    document.getElementById('venueModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('venueModal').classList.add('hidden');
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('closeButton').addEventListener('click', closeModal);
    document.getElementById('btnCloseModal').addEventListener('click', closeModal);
    document.getElementById('venueModal').addEventListener('click', function (e) {
        if (e.target === this) closeModal();
    });
});

function deleteVenue(id) {
    if (confirm("Yakin ingin menghapus venue ini?")) {
        fetch(`/admVenue/delete/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            location.reload();
        })
        .catch(error => {
            console.error(error);
            alert("Terjadi kesalahan.");
        });
    }
}
