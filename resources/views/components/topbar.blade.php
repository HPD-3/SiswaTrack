<header class="relative z-50 flex items-center justify-between 
               bg-gradient-to-r from-gray-900 via-blue-900 to-gray-800 
               backdrop-blur-md shadow-lg p-4 rounded-b-2xl border-b border-gray-700">
    
    <!-- Tombol toggle untuk mobile -->
    <button class="md:hidden text-blue-100 text-2xl hover:text-yellow-400 
                   transition-transform transform hover:scale-110" 
            id="mobileMenuBtn">
        ☰
    </button>

    <!-- Search -->
    <div class="flex-1 max-w-md mx-4">
        <form method="GET" action="{{ route('dashboard') }}" class="relative">
            <input type="search" name="search" value="{{ request('search') }}"
                   placeholder="Cari siswa, nilai, atau absensi..."
                   class="w-full rounded-lg bg-gray-800/70 border border-gray-600 px-3 py-2 pr-10
                          text-blue-100 placeholder-gray-400 
                          focus:ring-2 focus:ring-yellow-400 focus:border-yellow-300 
                          transition-all duration-300 hover:bg-gray-700/80">
            <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-yellow-400">
                🔍
            </button>
        </form>
    </div>

    <!-- User Menu -->
    <div class="relative z-50">
        <button id="userMenuBtn" 
                class="bg-blue-800/80 hover:bg-blue-700 text-white px-4 py-2 
                       rounded-xl font-semibold shadow-lg 
                       transition transform hover:scale-105 border border-gray-600
                       flex items-center space-x-2">
            <span class="text-lg">
                @if(auth()->user()->isAdmin()) 👨‍💼
                @elseif(auth()->user()->isTeacher()) 👨‍🏫
                @elseif(auth()->user()->isStudent()) 👨‍🎓
                @else 👤
                @endif
            </span>
            <span>{{ Auth::user()->name ?? 'Guest' }}</span>
            <span class="text-xs opacity-75">
                @if(auth()->user()->isAdmin()) Admin
                @elseif(auth()->user()->isTeacher()) Guru
                @elseif(auth()->user()->isStudent()) Siswa
                @endif
            </span>
        </button>
        <div id="userMenuDropdown" 
             class="hidden absolute right-0 mt-2 w-56 
                    bg-gradient-to-b from-gray-900 via-blue-900 to-gray-800 
                    text-blue-100 rounded-xl shadow-2xl overflow-hidden 
                    border border-gray-700 animate-fadeIn">
            
            <!-- User Info -->
            <div class="px-4 py-3 border-b border-gray-700">
                <div class="text-sm font-medium text-white">{{ Auth::user()->name }}</div>
                <div class="text-xs text-gray-400">{{ Auth::user()->email }}</div>
                <div class="text-xs text-yellow-400 mt-1">
                    @if(auth()->user()->isAdmin()) Administrator
                    @elseif(auth()->user()->isTeacher()) Guru
                    @elseif(auth()->user()->isStudent()) Siswa
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="py-2">
                <a href="{{ route('dashboard') }}" 
                   class="block px-4 py-2 hover:bg-blue-800 hover:text-white transition-all text-sm">
                    📊 Dashboard
                </a>
                
                @if(auth()->user()->isAdmin() || auth()->user()->isTeacher())
                <a href="{{ route('siswa.index') }}" 
                   class="block px-4 py-2 hover:bg-blue-800 hover:text-white transition-all text-sm">
                    👥 Data Siswa
                </a>
                @endif

                @if(auth()->user()->isAdmin())
                <a href="{{ route('kelas.index') }}" 
                   class="block px-4 py-2 hover:bg-blue-800 hover:text-white transition-all text-sm">
                    🏫 Data Kelas
                </a>
                <a href="{{ route('jurusan.index') }}" 
                   class="block px-4 py-2 hover:bg-blue-800 hover:text-white transition-all text-sm">
                    🎓 Data Jurusan
                </a>
                @endif

                @if(auth()->user()->isAdmin() || auth()->user()->isTeacher())
                <a href="{{ route('nilai.index') }}" 
                   class="block px-4 py-2 hover:bg-blue-800 hover:text-white transition-all text-sm">
                    📝 Data Nilai
                </a>
                <a href="{{ route('absensi.index') }}" 
                   class="block px-4 py-2 hover:bg-blue-800 hover:text-white transition-all text-sm">
                    📅 Data Absensi
                </a>
                @endif
            </div>

            <!-- Profile & Logout -->
            <div class="border-t border-gray-700 py-2">
                <a href="{{ route('profile.edit') }}" 
                   class="block px-4 py-2 hover:bg-blue-800 hover:text-white transition-all text-sm">
                    ⚙️ Profile Settings
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="w-full text-left px-4 py-2 hover:bg-red-800 hover:text-white transition-all text-sm">
                        🚪 Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
