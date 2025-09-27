<aside id="sidebar" 
       class="fixed inset-y-0 left-0 w-64 
              bg-gradient-to-b from-gray-900 via-blue-900 to-gray-800
              backdrop-blur-md border-r border-gray-700 text-blue-50 
              transform -translate-x-full md:translate-x-0 
              transition-transform ease-in-out duration-500 shadow-2xl z-40">

    <!-- Header -->
    <div class="flex items-center justify-between p-4 border-b border-gray-700">
        <h2 class="text-xl font-bold tracking-wide text-white">SiswaTrack</h2>
        <!-- Tombol Close mobile -->
        <button id="closeSidebar" 
                class="md:hidden text-white hover:text-yellow-400 
                       transition-transform transform hover:scale-125">
            ✖
        </button>
    </div>

    <!-- Menu -->
    <nav class="p-4 space-y-3">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" 
           class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 
                  hover:bg-blue-700/60 hover:pl-7 hover:shadow-lg hover:text-white
                  {{ request()->routeIs('dashboard') ? 'bg-blue-800/80 shadow-md text-white border-l-4 border-yellow-400' : '' }}">
            <span class="mr-3">📊</span> Dashboard
        </a>

        <!-- Student Management -->
        @if(auth()->user()->isAdmin() || auth()->user()->isTeacher())
        <div class="space-y-1">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-2">Data Siswa</div>
            <a href="{{ route('siswa.index') }}" 
               class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 
                      hover:bg-blue-700/60 hover:pl-7 hover:shadow-lg hover:text-white
                      {{ request()->routeIs('siswa.*') ? 'bg-blue-800/80 shadow-md text-white border-l-4 border-yellow-400' : '' }}">
                <span class="mr-3">👥</span> Daftar Siswa
            </a>
            <a href="{{ route('siswa.create') }}" 
               class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 
                      hover:bg-blue-700/60 hover:pl-7 hover:shadow-lg hover:text-white
                      {{ request()->routeIs('siswa.create') ? 'bg-blue-800/80 shadow-md text-white border-l-4 border-yellow-400' : '' }}">
                <span class="mr-3">➕</span> Tambah Siswa
            </a>
        </div>
        @endif

        <!-- Class & Major Management (Admin Only) -->
        @if(auth()->user()->isAdmin())
        <div class="space-y-1">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-2">Manajemen</div>
            <a href="{{ route('kelas.index') }}" 
               class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 
                      hover:bg-blue-700/60 hover:pl-7 hover:shadow-lg hover:text-white
                      {{ request()->routeIs('kelas.*') ? 'bg-blue-800/80 shadow-md text-white border-l-4 border-yellow-400' : '' }}">
                <span class="mr-3">🏫</span> Data Kelas
            </a>
            <a href="{{ route('jurusan.index') }}" 
               class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 
                      hover:bg-blue-700/60 hover:pl-7 hover:shadow-lg hover:text-white
                      {{ request()->routeIs('jurusan.*') ? 'bg-blue-800/80 shadow-md text-white border-l-4 border-yellow-400' : '' }}">
                <span class="mr-3">🎓</span> Data Jurusan
            </a>
        </div>
        @endif

        <!-- Academic Records -->
        @if(auth()->user()->isAdmin() || auth()->user()->isTeacher())
        <div class="space-y-1">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-2">Akademik</div>
            <a href="{{ route('nilai.index') }}" 
               class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 
                      hover:bg-blue-700/60 hover:pl-7 hover:shadow-lg hover:text-white
                      {{ request()->routeIs('nilai.*') ? 'bg-blue-800/80 shadow-md text-white border-l-4 border-yellow-400' : '' }}">
                <span class="mr-3">📝</span> Data Nilai
            </a>
            <a href="{{ route('absensi.index') }}" 
               class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 
                      hover:bg-blue-700/60 hover:pl-7 hover:shadow-lg hover:text-white
                      {{ request()->routeIs('absensi.*') ? 'bg-blue-800/80 shadow-md text-white border-l-4 border-yellow-400' : '' }}">
                <span class="mr-3">📅</span> Data Absensi
            </a>
        </div>
        @endif

        <!-- Student Profile (Student Only) -->
        @if(auth()->user()->isStudent())
        <div class="space-y-1">
            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-4 py-2">Profil Saya</div>
            <a href="{{ route('profile.edit') }}" 
               class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 
                      hover:bg-blue-700/60 hover:pl-7 hover:shadow-lg hover:text-white
                      {{ request()->routeIs('profile.*') ? 'bg-blue-800/80 shadow-md text-white border-l-4 border-yellow-400' : '' }}">
                <span class="mr-3">👤</span> Profil
            </a>
        </div>
        @endif
    </nav>
</aside>
