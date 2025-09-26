<aside id="sidebar" 
       class="fixed inset-y-0 left-0 w-64 
              bg-gradient-to-b from-gray-900 via-blue-900 to-gray-800
              backdrop-blur-md border-r border-gray-700 text-blue-50 
              transform -translate-x-full md:translate-x-0 
              transition-transform ease-in-out duration-500 shadow-2xl z-40">

    <!-- Header -->
    <div class="flex items-center justify-between p-4 border-b border-gray-700">
        <h2 class="text-xl font-bold tracking-wide text-white">Daftar Siswa</h2>
        <!-- Tombol Close mobile -->
        <button id="closeSidebar" 
                class="md:hidden text-white hover:text-yellow-400 
                       transition-transform transform hover:scale-125">
            ✖
        </button>
    </div>

    <!-- Menu -->
    <nav class="p-4 space-y-3">
        <a href="{{ route('siswa.index') }}" 
           class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 
                  hover:bg-blue-700/60 hover:pl-7 hover:shadow-lg hover:text-white
                  {{ request()->routeIs('siswa.index') ? 'bg-blue-800/80 shadow-md text-white border-l-4 border-yellow-400' : '' }}">
            <span class="mr-3">🏠</span> Home
        </a>

        <a href="{{ route('siswa.create') }}" 
           class="flex items-center px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 
                  hover:bg-blue-700/60 hover:pl-7 hover:shadow-lg hover:text-white
                  {{ request()->routeIs('siswa.create') ? 'bg-blue-800/80 shadow-md text-white border-l-4 border-yellow-400' : '' }}">
            <span class="mr-3">➕</span> Tambah Siswa
        </a>
    </nav>
</aside>
