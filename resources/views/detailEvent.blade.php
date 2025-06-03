<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Schedulo
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-[#e3e8eb]">
    <!-- Navbar -->
    <nav class="bg-[#2a6ad1] flex items-center justify-between px-4 sm:px-6 lg:px-10 py-3">
        <div class="flex items-center space-x-2">
            <h1 class="text-white font-extrabold text-xl sm:text-2xl flex items-center">
                Schedule
                <i class="far fa-clock ml-1">
                </i>
            </h1>
        </div>
        <ul class="hidden md:flex space-x-8 text-[#1a3e7a] font-semibold text-sm sm:text-base">
            <li>
                <a class="hover:text-white" href="#">
                    Home
                </a>
            </li>
            <li>
                <a class="bg-[#d1d5db] rounded-md px-3 py-1 text-[#1a3e7a] font-semibold" href="#">
                    Event
                </a>
            </li>
            <li>
                <a class="hover:text-white" href="#">
                    Venue
                </a>
            </li>
            <li>
                <a class="hover:text-white" href="#">
                    Jadwal
                </a>
            </li>
        </ul>
        <div class="flex items-center space-x-2 text-[#1a3e7a] font-semibold text-sm sm:text-base">
            <span>
                User - 3097
            </span>
            <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center">
                <i class="fas fa-user text-gray-600">
                </i>
            </div>
        </div>
    </nav>
    <!-- Main content container -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <!-- Banner image -->
        <img alt="Banner image with text Sosialisasi Program Pembinaan Mahasiswa Wirausaha 2024 with logos on top corners"
            class="w-full rounded-lg" height="200"
            src="https://storage.googleapis.com/a1aa/image/b92e97ee-3c2f-4c5f-6f49-0a16bc1079b7.jpg" width="900" />
        <!-- Detail Kegiatan heading -->
        <h3 class="text-center font-semibold text-gray-700 mt-4 mb-2">
            Detail Kegiatan
        </h3>
        <!-- Detail container -->
        <section class="border border-gray-400 rounded-md bg-[#f0f2f4] p-4 text-gray-900 text-sm sm:text-base">
            <p class="font-semibold mb-4">
                <span>
                    Nama Kegiatan :
                </span>
                <span class="font-normal">
                    Pembinaan Mahasiswa Wirausaha(P2MW)
                </span>
            </p>
            <!-- Quota, Registered, Available -->
            <div class="flex flex-col sm:flex-row sm:space-x-20 justify-center mb-4 space-y-4 sm:space-y-0">
                <div class="flex items-center rounded-md overflow-hidden w-40 sm:w-auto">
                    <div class="bg-[#1d64d1] text-white font-semibold px-4 py-2 rounded-l-md">
                        Kuota :
                    </div>
                    <div class="bg-[#d9d9d9] text-gray-800 font-semibold px-6 py-2 rounded-r-md">
                        100
                    </div>
                </div>
                <div class="flex items-center rounded-md overflow-hidden w-40 sm:w-auto">
                    <div class="bg-[#1d64d1] text-white font-semibold px-4 py-2 rounded-l-md">
                        Terdaftar :
                    </div>
                    <div class="bg-[#d9d9d9] text-gray-800 font-semibold px-6 py-2 rounded-r-md">
                        50
                    </div>
                </div>
                <div class="flex items-center rounded-md overflow-hidden w-40 sm:w-auto">
                    <div class="bg-[#1d64d1] text-white font-semibold px-4 py-2 rounded-l-md">
                        Tersedia :
                    </div>
                    <div class="bg-[#d9d9d9] text-gray-800 font-semibold px-6 py-2 rounded-r-md">
                        50
                    </div>
                </div>
            </div>
            <!-- Schedule and registration dates -->
            <div
                class="border border-gray-400 rounded-md p-3 mb-4 flex flex-col sm:flex-row sm:justify-between sm:items-center space-y-2 sm:space-y-0">
                <p class="font-semibold border-b border-gray-400 sm:border-b-0 sm:border-r sm:pr-4 mb-1 sm:mb-0">
                    Jadwal
                </p>
                <p class="font-semibold">
                    <span>
                        Tanggal Event :
                    </span>
                    <span class="font-bold">
                        24 Januari - 24 Januari
                    </span>
                </p>
                <p class="font-semibold">
                    <span>
                        Batas Daftar &amp; Bayar :
                    </span>
                    <span class="font-bold">
                        10 Desember - 20 Januari
                    </span>
                </p>
            </div>
            <!-- Bottom details container -->
            <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                <!-- Left side: Narasumber, Deskripsi, Tiket -->
                <div class="flex flex-col space-y-4 sm:w-1/2">
                    <section class="border border-gray-400 rounded-md p-3 text-xs sm:text-sm">
                        <p class="font-semibold border-b border-gray-400 mb-2">
                            Narasumber :
                        </p>
                        <ul class="list-disc list-inside text-gray-700">
                            <li>
                                Fahrobby Adnan S.Kom., M., MSI
                            </li>
                            <li>
                                Jacob Win S.T., S.Kom., M.Kom., Acc
                            </li>
                            <li>
                                Qurrota A’ Yuni AR Rumimat. Spd., Msc
                            </li>
                        </ul>
                    </section>
                    <section class="border border-gray-400 rounded-md p-3 text-xs sm:text-sm">
                        <p class="font-semibold border-b border-gray-400 mb-2">
                            Deskripsi :
                        </p>
                        <p class="font-bold text-gray-700">
                            P2MW adalah seminar untuk pembinaan mahasiswa di bidang WiraUsaha
                        </p>
                    </section>
                    <section class="border border-gray-400 rounded-md p-3 text-xs sm:text-sm">
                        <p class="font-semibold border-b border-gray-400 mb-2">
                            Tiket :
                        </p>
                        <p class="font-bold text-gray-700">
                            Mahasiswa : Gratis
                        </p>
                    </section>
                </div>
                <!-- Right side: Venue -->
                <section class="border border-gray-400 rounded-md p-3 text-xs sm:text-sm sm:w-1/2">
                    <p class="font-semibold border-b border-gray-400 mb-2">
                        Venue :
                    </p>
                    <img alt="Venue room image showing people sitting in a classroom with a presenter in front"
                        class="mb-3 rounded" height="120"
                        src="https://storage.googleapis.com/a1aa/image/04689548-dfc2-4aa9-ca5e-a15f4f677d69.jpg"
                        width="300" />
                    <div class="text-gray-700 space-y-1 text-[11px] sm:text-xs">
                        <p>
                            <span class="font-semibold">
                                Lokasi
                            </span>
                            :
                            <span class="font-bold">
                                Ruang B1 &amp; B2 Fakultas Ilmu Komputer
                            </span>
                        </p>
                        <p>
                            <span class="font-semibold">
                                Keterangan
                            </span>
                            :
                            <span class="font-bold">
                                Offline
                            </span>
                        </p>
                        <p>
                            <span class="font-semibold">
                                Tautan Zoom
                            </span>
                            :
                            <span class="font-bold">
                                -
                            </span>
                        </p>
                        <p>
                            <span class="font-semibold">
                                Contact Person
                            </span>
                            :
                            <span class="font-bold">
                                +62 674 6754 6512
                            </span>
                        </p>
                    </div>
                </section>
            </div>
        </section>
    </main>
    {{-- footer --}}
    <x-footer />
</body>

</html>
