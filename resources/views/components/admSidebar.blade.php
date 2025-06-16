<aside class="w-48 bg-[#B0BEC5] p-4 flex flex-col min-h-screen shadow-lg">
    <!-- Navigation Menu -->
    <nav class="space-y-2 flex-grow">
        <a href="{{ route('admDashboard') }}"
            class="block w-full px-4 py-3 text-white font-medium rounded-lg transition-colors {{ request()->routeIs('admDashboard') ? 'bg-blue-600' : 'bg-blue-500 hover:bg-blue-600' }}">
            Beranda
        </a>
        <a href="{{ route('admEvent') }}"
            class="block w-full px-4 py-3 text-white font-medium rounded-lg transition-colors {{ request()->routeIs('admEvent') ? 'bg-blue-600' : 'bg-blue-500 hover:bg-blue-600' }}">
            Event
        </a>
        <a href="{{ route('admVenue') }}"
            class="block w-full px-4 py-3 text-white font-medium rounded-lg transition-colors {{ request()->routeIs('admVenue') ? 'bg-blue-600' : 'bg-blue-500 hover:bg-blue-600' }}">
            Venue
        </a>
    </nav>

    <!-- Logout Button - Fixed at bottom -->
    <div class="mt-auto pt-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full px-4 py-3 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors flex items-center justify-center">
                <i class="fas fa-sign-out-alt mr-2"></i>Logout
            </button>
        </form>
    </div>
</aside>
