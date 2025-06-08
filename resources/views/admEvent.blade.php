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
                    <h2 class="text-3xl font-bold text-blue-600">Event</h2>
                    <button
                        class="bg-yellow-400 hover:bg-yellow-500 text-black font-medium px-6 py-2 rounded-lg transition-colors">
                        Event Diajukan
                    </button>
                </div>

                <!-- Events List -->
                <div class="space-y-4">
                    <!-- Event 1: JAWARA CODE -->
                    <div class="bg-gray-200 rounded-lg p-4 flex justify-between items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">JAWARA CODE : Pembinaan CPC</h3>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium">
                                16 Des - 17 Des
                            </span>
                            <button
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Detail
                            </button>
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Hapus
                            </button>
                        </div>
                    </div>

                    <!-- Event 2: P2MW -->
                    <div class="bg-gray-200 rounded-lg p-4 flex justify-between items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">Pembinaan Mahasiswa Wirausaha (P2MW)</h3>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium">
                                24 Jan - 24 Jan
                            </span>
                            <button
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Detail
                            </button>
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Hapus
                            </button>
                        </div>
                    </div>

                    <!-- Event 3: Awarding Night FASILKOM -->
                    <div class="bg-gray-200 rounded-lg p-4 flex justify-between items-center">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">Awarding Night FASILKOM</h3>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-blue-600 text-white px-4 py-2 rounded-lg font-medium">
                                23 Mei - 24 Mei
                            </span>
                            <button
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Detail
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
