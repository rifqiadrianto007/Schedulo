
        function venueApp() {
            return {
                showModal: false,
                selectedVenue: null,
                searchQuery: '',
                currentPage: 1,
                itemsPerPage: 6,
                venues: [
                    {
                        id: 1,
                        name: 'Ruang Kelas B1 & B2',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        location: 'Kampus',
                        image: '{{ asset("img/AuditFasilkom.png") }}',
                        facilities: [
                            'Air Conditioner (2)',
                            'Kursi Lipat (150)',
                            'Proyektor (2)',
                            'Layar LCD',
                            'Sound System',
                            'Mic (2)'
                        ],
                        rules: [
                            'Alat menjadi tanggung jawab penyewa',
                            'Max Penggunaan hingga pukul 17:00 WIB',
                            'Maksimal Kapasitas 170 orang'
                        ]
                    },
                    {
                        id: 2,
                        name: 'Auditorium Utama',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        location: 'Kampus',
                        image: '{{ asset("img/AuditFasilkom.png") }}',
                        facilities: [
                            'Air Conditioner (4)',
                            'Kursi Theater (300)',
                            'Proyektor (3)',
                            'Layar LCD Besar',
                            'Sound System Professional',
                            'Mic Wireless (4)',
                            'Lighting System'
                        ],
                        rules: [
                            'Booking minimal 3 hari sebelumnya',
                            'Max Penggunaan hingga pukul 21:00 WIB',
                            'Maksimal Kapasitas 300 orang',
                            'Wajib menggunakan operator sound system'
                        ]
                    },
                    {
                        id: 3,
                        name: 'Ruang Seminar C1',
                        address: 'Jl. Kalimantan No.37, Kampus Tegalboto',
                        location: 'Kampus',
                        image: '{{ asset("img/AuditFasilkom.png") }}',
                        facilities: [
                            'Air Conditioner (1)',
                            'Kursi Lipat (50)',
                            'Proyektor (1)',
                            'Layar LCD',
                            'Sound System',
                            'Mic (1)',
                            'Whiteboard'
                        ],
                        rules: [
                            'Cocok untuk seminar kecil',
                            'Max Penggunaan hingga pukul 17:00 WIB',
                            'Maksimal Kapasitas 50 orang'
                        ]
                    }
                ],

                get filteredVenues() {
                    if (!this.searchQuery.trim()) {
                        return this.venues;
                    }

                    return this.venues.filter(venue =>
                        venue.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                        venue.address.toLowerCase().includes(this.searchQuery.toLowerCase())
                    );
                },

                get totalPages() {
                    return Math.ceil(this.filteredVenues.length / this.itemsPerPage);
                },

                searchVenues() {
                    this.currentPage = 1;
                },

                openModal(venue) {
                    this.selectedVenue = venue;
                    this.showModal = true;
                    document.body.style.overflow = 'hidden';
                },

                closeModal() {
                    this.showModal = false;
                    document.body.style.overflow = 'auto';
                    setTimeout(() => {
                        this.selectedVenue = null;
                    }, 200);
                },

                goToPage(page) {
                    this.currentPage = page;
                },

                previousPage() {
                    if (this.currentPage > 1) {
                        this.currentPage--;
                    }
                },

                nextPage() {
                    if (this.currentPage < this.totalPages) {
                        this.currentPage++;
                    }
                }
            }
        }
