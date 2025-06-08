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
                <!-- Header Section -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-blue-600">Venue</h2>
                    <button
                        class="bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-2 rounded-lg transition-colors">
                        Tambah
                    </button>
                </div>

                <!-- Venues List -->
                <div class="space-y-4">
                    <!-- Venue 1: Ruang Kelas B1 & B2 -->
                    <div class="bg-gray-200 rounded-lg p-4 flex justify-between items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">Ruang Kelas B1 & B2</h3>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Edit
                            </button>
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Hapus
                            </button>
                        </div>
                    </div>

                    <!-- Venue 2: Gedung Soerachman -->
                    <div class="bg-gray-200 rounded-lg p-4 flex justify-between items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">Gedung Soerachman</h3>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Edit
                            </button>
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Hapus
                            </button>
                        </div>
                    </div>

                    <!-- Venue 3: Auditorium Fasilkom -->
                    <div class="bg-gray-200 rounded-lg p-4 flex justify-between items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">Auditorium Fasilkom</h3>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Edit
                            </button>
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Hapus
                            </button>
                        </div>
                    </div>

                    <!-- Venue 4: Online -->
                    <div class="bg-gray-200 rounded-lg p-4 flex justify-between items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">Online</h3>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Edit
                            </button>
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
