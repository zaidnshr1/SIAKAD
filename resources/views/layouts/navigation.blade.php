<nav class="bg-white border-b border-gray-100" style="padding: 10px 20px; border-bottom: 1px solid #ddd;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <!-- Logo / Brand -->
        <div>
            <a href="/" style="font-weight: bold; text-decoration: none; color: #333;">SIAKAD</a>
        </div>

        <!-- Menu Navigasi -->
        <div style="display: flex; align-items: center; gap: 15px;">
            @php
                $dashboardRoute = route('login');
                if(Auth::check()) {
                    if(Auth::user()->role == 'admin') $dashboardRoute = route('admin.dashboard');
                    if(Auth::user()->role == 'dosen') $dashboardRoute = route('dosen.dashboard');
                    if(Auth::user()->role == 'mahasiswa') $dashboardRoute = route('mahasiswa.dashboard');
                }
            @endphp

            @if(Auth::check())
                <a href="{{ $dashboardRoute }}" style="text-decoration: none; color: #007bff;">Dashboard</a>
                <span>{{ Auth::user()->name }} ({{ Auth::user()->role }})</span>

                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:#dc3545; cursor:pointer;">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" style="text-decoration: none; color: #007bff;">Login</a>
                <a href="{{ route('register') }}" style="text-decoration: none; color: #007bff;">Register</a>
            @endif
        </div>
    </div>
</nav>
