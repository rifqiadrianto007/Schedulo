document.addEventListener('DOMContentLoaded', function () {
    const today = new Date().toISOString().split('T')[0];
    const tanggalDilaksanakan = document.getElementById('tanggal-dilaksanakan');
    const tenggatPendaftaran = document.getElementById('tenggat-pendaftaran');

    if (tanggalDilaksanakan) {
        tanggalDilaksanakan.setAttribute('min', today);
    }
    if (tenggatPendaftaran) {
        tenggatPendaftaran.setAttribute('min', today);
    }

    const posterInput = document.getElementById('poster-upload');
    const previewImg = document.getElementById('poster-preview');

    if (posterInput) {
        posterInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            const fileName = file?.name;
            const fileSize = file?.size;
            const parentDiv = e.target.parentElement;
            const textP = parentDiv.querySelector('p');

            if (fileSize > 5 * 1024 * 1024) {
                alert('File terlalu besar! Maksimal 5MB');
                e.target.value = '';
                return;
            }

            if (file && previewImg) {
                const reader = new FileReader();
                reader.onload = function (ev) {
                    previewImg.src = ev.target.result;
                    previewImg.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }

            if (textP && fileName) {
                textP.textContent = fileName;
                textP.classList.add('text-green-600', 'font-medium');
                parentDiv.classList.add('border-green-400', 'bg-green-50');
            }
        });
    }
    
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const requiredFields = ['input[type="text"]', 'select', 'input[type="date"]', 'textarea'];
            let isValid = true;

            requiredFields.forEach(selector => {
                const fields = form.querySelectorAll(selector);
                fields.forEach(field => {
                    if (!field.value.trim() && field.name !== 'biaya_pendaftaran') {
                        field.classList.add('border-red-500');
                        isValid = false;
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });
            });

            if (!isValid) {
                alert('Mohon lengkapi semua field yang diperlukan!');
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Mengajukan...';
            submitBtn.classList.add('opacity-75');

            setTimeout(() => {
                form.submit();
            }, 1000);
        });
    }
});
