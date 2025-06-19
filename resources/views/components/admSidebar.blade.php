<aside class="w-48 bg-[#B0BEC5] flex flex-col h-screen shadow-lg">
    <!-- Navigation Menu -->
    <nav class="space-y-2 p-4 pb-2">
        <a href="{{ route('admDashboard') }}"
            class="block w-full px-4 py-3 text-white font-medium rounded-lg transition-colors {{ request()->routeIs('admDashboard') ? 'bg-blue-600' : 'bg-blue-500 hover:bg-blue-600' }}">
            Beranda
        </a>
        <a href="{{ route('eventList') }}"
            class="block w-full px-4 py-3 text-white font-medium rounded-lg transition-colors {{ request()->routeIs('admEvent') ? 'bg-blue-600' : 'bg-blue-500 hover:bg-blue-600' }}">
            Event
        </a>
        <a href="{{ route('admVenue') }}"
            class="block w-full px-4 py-3 text-white font-medium rounded-lg transition-colors {{ request()->routeIs('admVenue') ? 'bg-blue-600' : 'bg-blue-500 hover:bg-blue-600' }}">
            Venue
        </a>
    </nav>

    <!-- Spacer untuk mendorong logout ke bawah -->
    <div class="flex-grow"></div>

    <!-- Logout Button - Always visible at bottom -->
    <div class="p-4 pt-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full px-4 py-3 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors flex items-center justify-center">
                <i class="fas fa-sign-out-alt mr-2"></i>Logout
            </button>
        </form>
    </div>
</aside>
