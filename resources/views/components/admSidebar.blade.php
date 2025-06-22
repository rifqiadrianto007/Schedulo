<aside class="w-64 bg-white shadow-lg border-r border-gray-200">
    <div class="flex flex-col h-full">
        <!-- Navigation Menu -->
        <nav class="flex-1 px-4 py-6 space-y-2">
            <!-- Dashboard/Beranda -->
            <a href="{{ route('admDashboard') }}"
                class="flex items-center px-4 py-3 rounded-xl font-medium transition-all duration-200 {{ request()->routeIs('admDashboard') ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                <div
                    class="w-10 h-10 rounded-lg flex items-center justify-center {{ request()->routeIs('admDashboard') ? 'bg-white/20' : 'bg-blue-100' }}">
                    <i
                        class="fas fa-home text-lg {{ request()->routeIs('admDashboard') ? 'text-white' : 'text-blue-600' }}"></i>
                </div>
                <span class="ml-3">Beranda</span>
                @if (request()->routeIs('admDashboard'))
                    <div class="ml-auto w-2 h-2 bg-white rounded-full"></div>
                @endif
            </a>

            <!-- Event -->
            <a href="{{ route('eventList') }}"
                class="flex items-center px-4 py-3 rounded-xl font-medium transition-all duration-200 {{ request()->routeIs('eventList') || request()->routeIs('event*') ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-md' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                <div
                    class="w-10 h-10 rounded-lg flex items-center justify-center {{ request()->routeIs('eventList') || request()->routeIs('event*') ? 'bg-white/20' : 'bg-blue-100' }}">
                    <i
                        class="fas fa-calendar-alt text-lg {{ request()->routeIs('eventList') || request()->routeIs('event*') ? 'text-white' : 'text-blue-600' }}"></i>
                </div>
                <span class="ml-3">Event</span>
                @if (request()->routeIs('eventList') || request()->routeIs('event*'))
                    <div class="ml-auto w-2 h-2 bg-white rounded-full"></div>
                @endif
            </a>

            <!-- Venue -->
            <a href="{{ route('admVenue') }}"
                class="flex items-center px-4 py-3 rounded-xl font-medium transition-all duration-200 {{ request()->routeIs('admVenue') || request()->routeIs('venue*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-md' : 'text-gray-700 hover:bg-green-50 hover:text-green-600' }}">
                <div
                    class="w-10 h-10 rounded-lg flex items-center justify-center {{ request()->routeIs('admVenue') || request()->routeIs('venue*') ? 'bg-white/20' : 'bg-green-100' }}">
                    <i
                        class="fas fa-map-marked-alt text-lg {{ request()->routeIs('admVenue') || request()->routeIs('venue*') ? 'text-white' : 'text-green-600' }}"></i>
                </div>
                <span class="ml-3">Venue</span>
                @if (request()->routeIs('admVenue') || request()->routeIs('venue*'))
                    <div class="ml-auto w-2 h-2 bg-white rounded-full"></div>
                @endif
            </a>
        </nav>

        <!-- Logout Section -->
        <div class="p-4 border-t border-gray-200">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center px-4 py-3 bg-gradient-to-r from-red-500 to-pink-600 text-white font-medium rounded-xl transition-all duration-200 hover:from-red-600 hover:to-pink-700 shadow-md hover:shadow-lg">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-sign-out-alt text-white text-lg"></i>
                    </div>
                    <span class="ml-3">Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
