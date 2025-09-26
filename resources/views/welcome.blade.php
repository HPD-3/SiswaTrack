<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswatrack - Sistem Manajemen Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass { background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 text-white">

    <!-- Navbar -->
    <nav class="w-full py-4 px-6 flex justify-between items-center glass shadow-lg fixed top-0 z-50">
        <div class="text-2xl font-bold text-blue-300">Siswatrack</div>
        <div class="space-x-4">
            <a href="#features" class="hover:text-yellow-400 transition">Fitur</a>
            <a href="#about" class="hover:text-yellow-400 transition">Tentang</a>
            <a href="#contact" class="hover:text-yellow-400 transition">Kontak</a>
            <a href="{{ route('siswa.index') }}" class="bg-blue-700 hover:bg-blue-600 px-4 py-2 rounded-lg shadow-md transition">Masuk</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="h-screen flex flex-col justify-center items-center text-center px-6">
        <h1 class="text-5xl font-bold mb-4 text-blue-300">Selamat Datang di Siswatrack</h1>
        <p class="text-lg max-w-xl mb-6 text-gray-300">Sistem manajemen siswa modern untuk memudahkan tracking data siswa, angkatan, jurusan, dan informasi penting lainnya.</p>
        <a href="{{ route('siswa.index') }}" class="bg-yellow-600 hover:bg-yellow-500 text-gray-900 px-6 py-3 rounded-lg font-semibold shadow-lg transition">Mulai Sekarang</a>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-20 px-6">
        <h2 class="text-3xl font-bold text-center mb-12 text-blue-300">Fitur Utama</h2>
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass p-6 rounded-2xl shadow-lg hover:shadow-blue-400/40 transition">
                <h3 class="text-xl font-bold mb-3">Manajemen Siswa</h3>
                <p>Tambah, edit, hapus, dan lihat data siswa dengan mudah menggunakan panel admin yang elegan.</p>
            </div>
            <div class="glass p-6 rounded-2xl shadow-lg hover:shadow-blue-400/40 transition">
                <h3 class="text-xl font-bold mb-3">Filter & Cari Cepat</h3>
                <p>Cari siswa berdasarkan nama, NISN, jurusan, atau angkatan dalam hitungan detik.</p>
            </div>
            <div class="glass p-6 rounded-2xl shadow-lg hover:shadow-blue-400/40 transition">
                <h3 class="text-xl font-bold mb-3">Data Lengkap</h3>
                <p>Lihat informasi detail siswa, termasuk jurusan, angkatan, nomor HP, dan status aktif.</p>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 px-6 bg-gray-900/70">
        <h2 class="text-3xl font-bold text-center mb-12 text-blue-300">Tentang Siswatrack</h2>
        <p class="max-w-3xl mx-auto text-center text-gray-300">
            Siswatrack dirancang untuk sekolah dan instansi pendidikan yang ingin mempermudah manajemen data siswa secara modern. Sistem ini menggunakan desain elegan dengan efek glassy, warna biru tua kehitaman, dan responsif di semua perangkat.
        </p>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 px-6">
        <h2 class="text-3xl font-bold text-center mb-12 text-blue-300">Kontak</h2>
        <p class="max-w-3xl mx-auto text-center text-gray-300 mb-6">Untuk pertanyaan atau demo, hubungi kami melalui email atau telepon.</p>
        <div class="flex flex-col md:flex-row justify-center items-center gap-6">
            <div class="glass p-6 rounded-2xl shadow-lg hover:shadow-blue-400/40 transition text-center">
                <h3 class="font-bold mb-2">Email</h3>
                <p>admin@siswatrack.com</p>
            </div>
            <div class="glass p-6 rounded-2xl shadow-lg hover:shadow-blue-400/40 transition text-center">
                <h3 class="font-bold mb-2">Telepon</h3>
                <p>+62 812 3456 7890</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 text-center text-gray-400 border-t border-gray-700">
        &copy; 2025 Siswatrack. All rights reserved.
    </footer>
</body>
</html>
