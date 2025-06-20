<!-- Sidebar Component -->
<aside
    style="width: 16rem; background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border-right: 1px solid rgba(255, 255, 255, 0.2); position: relative;">
    <div
        style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(248, 250, 252, 0.5), rgba(239, 246, 255, 0.5));">
    </div>

    <div style="position: relative; z-index: 10; display: flex; flex-direction: column; height: 100%;">
        <!-- Navigation Menu -->
        <nav style="flex: 1; padding: 1.5rem 1rem; display: flex; flex-direction: column; gap: 0.75rem;">
            <div style="margin-bottom: 1.5rem;">
                <p
                    style="font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; padding: 0 0.75rem; margin: 0;">
                    Menu Utama</p>
            </div>

            <a href="{{ route('admDashboard') }}"
                style="position: relative; overflow: hidden; display: flex; align-items: center; padding: 0.75rem 1rem; color: white; font-weight: 500; border-radius: 0.75rem; transition: all 0.3s ease; background: linear-gradient(90deg, #3b82f6, #8b5cf6); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); text-decoration: none; {{ request()->routeIs('admDashboard') ? '' : 'color: #374151;' }}">
                <div
                    style="width: 2.5rem; height: 2.5rem; background: rgba(255, 255, 255, 0.2); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; transition: transform 0.3s ease;">
                    <i class="fas fa-home" style="font-size: 1.125rem;"></i>
                </div>
                <span style="margin-left: 0.75rem; font-weight: 600;">Beranda</span>
                <div style="margin-left: auto; width: 0.5rem; height: 0.5rem; background: white; border-radius: 50%;">
                </div>
            </a>

            <a href="{{ route('eventList') }}"
                style="position: relative; overflow: hidden; display: flex; align-items: center; padding: 0.75rem 1rem; color: #374151; font-weight: 500; border-radius: 0.75rem; transition: all 0.3s ease; text-decoration: none; {{ request()->routeIs('admEvent') ? 'background: linear-gradient(90deg, #3b82f6, #8b5cf6); color: white; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);' : '' }}"
                onmouseover="this.style.color='#2563eb'; this.style.background='#eff6ff';"
                onmouseout="this.style.color='#374151'; this.style.background='transparent';">
                <div style="width: 2.5rem; height: 2.5rem; background: #dbeafe; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;"
                    onmouseover="this.style.background='#bfdbfe'; this.style.transform='scale(1.1)';"
                    onmouseout="this.style.background='#dbeafe'; this.style.transform='scale(1)';">
                    <i class="fas fa-calendar-alt" style="color: #2563eb; font-size: 1.125rem;"></i>
                </div>
                <span style="margin-left: 0.75rem;">Event</span>
                <div style="margin-left: auto; opacity: 0; transition: opacity 0.3s ease;"
                    onmouseover="this.style.opacity='1';" onmouseout="this.style.opacity='0';">
                    <i class="fas fa-arrow-right" style="font-size: 0.875rem;"></i>
                </div>
            </a>

            <a href="{{ route('admVenue') }}"
                style="position: relative; overflow: hidden; display: flex; align-items: center; padding: 0.75rem 1rem; color: #374151; font-weight: 500; border-radius: 0.75rem; transition: all 0.3s ease; text-decoration: none; {{ request()->routeIs('admVenue') ? 'background: linear-gradient(90deg, #10b981, #059669); color: white; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);' : '' }}"
                onmouseover="this.style.color='#059669'; this.style.background='#f0fdf4';"
                onmouseout="this.style.color='#374151'; this.style.background='transparent';">
                <div style="width: 2.5rem; height: 2.5rem; background: #dcfce7; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;"
                    onmouseover="this.style.background='#bbf7d0'; this.style.transform='scale(1.1)';"
                    onmouseout="this.style.background='#dcfce7'; this.style.transform='scale(1)';">
                    <i class="fas fa-map-marked-alt" style="color: #059669; font-size: 1.125rem;"></i>
                </div>
                <span style="margin-left: 0.75rem;">Venue</span>
                <div style="margin-left: auto; opacity: 0; transition: opacity 0.3s ease;"
                    onmouseover="this.style.opacity='1';" onmouseout="this.style.opacity='0';">
                    <i class="fas fa-arrow-right" style="font-size: 0.875rem;"></i>
                </div>
            </a>
        </nav>

        <!-- Logout Button -->
        <div style="padding: 1rem; border-top: 1px solid rgba(229, 231, 235, 0.5);">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    style="width: 100%; display: flex; align-items: center; padding: 0.75rem 1rem; background: linear-gradient(90deg, #ef4444, #ec4899); color: white; font-weight: 600; border-radius: 0.75rem; transition: all 0.3s ease; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); border: none; cursor: pointer; transform: scale(1);"
                    onmouseover="this.style.background='linear-gradient(90deg, #dc2626, #db2777)'; this.style.boxShadow='0 20px 25px -5px rgba(0, 0, 0, 0.1)'; this.style.transform='scale(1.05)';"
                    onmouseout="this.style.background='linear-gradient(90deg, #ef4444, #ec4899)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1)'; this.style.transform='scale(1)';">
                    <div style="width: 2.5rem; height: 2.5rem; background: rgba(255, 255, 255, 0.2); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; transition: transform 0.3s ease;"
                        onmouseover="this.style.transform='rotate(12deg)';"
                        onmouseout="this.style.transform='rotate(0deg)';">
                        <i class="fas fa-sign-out-alt" style="font-size: 1.125rem;"></i>
                    </div>
                    <span style="margin-left: 0.75rem;">Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
