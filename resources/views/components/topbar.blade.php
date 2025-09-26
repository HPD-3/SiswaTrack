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
    <form method="GET" action="{{ route('siswa.index') }}" class="flex-1 max-w-md mx-4">
        <input type="search" name="search" value="{{ request('search') }}"
               placeholder="Cari siswa..."
               class="w-full rounded-lg bg-gray-800/70 border border-gray-600 px-3 py-2 
                      text-blue-100 placeholder-gray-400 
                      focus:ring-2 focus:ring-yellow-400 focus:border-yellow-300 
                      transition-all duration-300 hover:bg-gray-700/80">
    </form>

    <!-- User Menu -->
    <div class="relative z-50">
        <button id="userMenuBtn" 
                class="bg-blue-800/80 hover:bg-blue-700 text-white px-4 py-2 
                       rounded-xl font-semibold shadow-lg 
                       transition transform hover:scale-105 border border-gray-600">
            {{ Auth::user()->name ?? 'Guest' }}
        </button>
        <div id="userMenuDropdown" 
             class="hidden absolute right-0 mt-2 w-48 
                    bg-gradient-to-b from-gray-900 via-blue-900 to-gray-800 
                    text-blue-100 rounded-xl shadow-2xl overflow-hidden 
                    border border-gray-700 animate-fadeIn">
            <a href="{{ route('profile.edit') }}" 
               class="block px-4 py-2 hover:bg-blue-800 hover:text-white transition-all">⚙️ Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                        class="w-full text-left px-4 py-2 hover:bg-blue-800 hover:text-white transition-all">🚪 Log Out</button>
            </form>
        </div>
    </div>
</header>
