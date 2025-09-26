<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Contact Book') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
</head>
<body class="bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 min-h-screen flex font-sans text-blue-100">

<!-- Main -->
<div class="flex-1 flex flex-col md:ml-64 transition-all">
    
    <!-- Sidebar -->
    <x-sidebar />

    <!-- Topbar -->
    <x-topbar />

    <!-- Content -->
    <main class="flex-1 p-6 relative z-0">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-600/80 text-white rounded-lg shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-blue-800/30 backdrop-blur-lg rounded-2xl shadow-xl p-6 
                    overflow-visible border border-blue-700/40 
                    hover:shadow-2xl hover:border-blue-500/50 transition-all duration-300">
            @yield('content')
        </div>
    </main>
</div>


<script>
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const sidebar = document.getElementById('sidebar');
    const closeSidebar = document.getElementById('closeSidebar');
    const userMenuBtn = document.getElementById('userMenuBtn');
    const userMenuDropdown = document.getElementById('userMenuDropdown');

    // Toggle sidebar mobile pakai toggle
    mobileMenuBtn?.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
    });

    // Tombol close (khusus di sidebar header)
    closeSidebar?.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
    });

    // Toggle dropdown user menu
    userMenuBtn?.addEventListener('click', (e) => {
        e.stopPropagation(); // biar gak langsung ketutup
        userMenuDropdown.classList.toggle('hidden');
    });

    // Tutup dropdown kalau klik di luar
    document.addEventListener('click', (e) => {
        if (!userMenuBtn.contains(e.target) && !userMenuDropdown.contains(e.target)) {
            userMenuDropdown.classList.add('hidden');
        }
    });
</script>


<script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" 
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
<script type="text/javascript">
    let table = new DataTable('#myTable');
</script>
</body>
</html>
