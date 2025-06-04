    <header class="bg-primary-blue px-4 py-3">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <h1 class="text-white text-2xl font-bold">Schedulo</h1>
                <div class="ml-2 w-6 h-6 bg-white rounded-full flex items-center justify-center">
                    <i class="fas fa-check text-primary-blue text-sm"></i>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex space-x-1">
                <a href="{{ route('home') }}" class="px-4 py-2 bg-white text-gray-800 rounded-full font-medium">Home</a>
                <a href="{{ route('event') }}"
                    class="px-4 py-2 text-white hover:bg-blue-600 rounded-full font-medium">Event</a>
                <a href="{{ route('venue') }}"
                    class="px-4 py-2 text-white hover:bg-blue-600 rounded-full font-medium">Venue</a>
                <a href="{{ route('home') }}"
                    class="px-4 py-2 text-white hover:bg-blue-600 rounded-full font-medium">Jadwal</a>
            </nav>

            <!-- Login Button -->
            <div class="flex items-center">
                <a href="{{ route('login') }}"
                    class="bg-yellow-400 text-black px-4 py-2 rounded-full font-bold text-sm hover:bg-yellow-500 inline-block text-center">
                    MASUK
                </a>
            </div>
        </div>
    </header>
