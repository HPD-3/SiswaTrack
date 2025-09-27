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
        .glass { background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(12px); }
        .fade-in { opacity: 0; transform: translateY(40px); transition: opacity 1s cubic-bezier(.4,0,.2,1), transform 1s cubic-bezier(.4,0,.2,1); }
        .fade-in.visible { opacity: 1; transform: translateY(0); }
        .gradient-text {
            background: linear-gradient(90deg, #38bdf8 0%, #818cf8 50%, #fbbf24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px);}
            50% { transform: translateY(-24px);}
        }
        .glow {
            box-shadow: 0 0 32px 0 #38bdf8, 0 0 8px 0 #fbbf24;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.2 });
            document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
        });
    </script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 text-white min-h-screen relative overflow-x-hidden">

    <!-- Animated Background Blobs -->
    <div class="pointer-events-none fixed inset-0 z-0">
        <div class="absolute top-[-10%] left-[-10%] w-[72vw] max-w-[400px] h-[72vw] max-h-[400px] bg-blue-500 opacity-30 rounded-full blur-3xl floating"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[90vw] max-w-[500px] h-[90vw] max-h-[500px] bg-yellow-400 opacity-20 rounded-full blur-3xl floating" style="animation-delay:2s"></div>
        <div class="absolute top-[30%] right-[10%] w-[54vw] max-w-[300px] h-[54vw] max-h-[300px] bg-indigo-400 opacity-20 rounded-full blur-2xl floating" style="animation-delay:4s"></div>
    </div>

    <!-- Navbar -->
    <nav class="w-full py-4 px-4 sm:px-8 flex flex-wrap justify-between items-center glass shadow-lg fixed top-0 z-50 backdrop-blur-lg bg-opacity-70 transition-all duration-500">
        <div class="text-2xl sm:text-3xl font-extrabold gradient-text tracking-tight drop-shadow-lg">Siswatrack</div>
        <div class="flex flex-wrap gap-3 sm:gap-6 text-base sm:text-lg mt-3 sm:mt-0">
            <a href="#features" class="hover:text-yellow-400 transition-colors duration-300">Fitur</a>
            <a href="#about" class="hover:text-yellow-400 transition-colors duration-300">Tentang</a>
            <a href="#contact" class="hover:text-yellow-400 transition-colors duration-300">Kontak</a>
            <a href="{{ route('register') }}" class="bg-blue-700 hover:bg-blue-600 px-4 sm:px-5 py-2 rounded-xl shadow-md font-semibold transition-all duration-300">Masuk</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative min-h-[80vh] flex flex-col justify-center items-center text-center px-4 sm:px-6 pt-32 sm:pt-40 z-10">
        <div class="fade-in w-full max-w-3xl mx-auto">
            <h1 class="text-4xl sm:text-5xl md:text-7xl font-extrabold mb-6 gradient-text drop-shadow-lg tracking-tight animate__animated animate__fadeInDown">
                Selamat Datang di Siswatrack
            </h1>
            <p class="text-base sm:text-xl md:text-2xl max-w-2xl mx-auto mb-8 text-gray-200 animate__animated animate__fadeInUp animate__delay-1s">
                Sistem manajemen siswa modern dengan desain elegan, animasi halus, dan pengalaman pengguna yang memukau. Kelola data siswa, angkatan, jurusan, dan informasi penting lainnya dengan mudah dan aman.
            </p>
            <!-- Perbaikan: pastikan tombol bisa diklik dengan menambah pointer-events-auto dan z-index tinggi -->
            <a href="{{ route('register') }}"
               class="inline-block bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 hover:from-yellow-500 hover:to-yellow-400 text-gray-900 px-6 sm:px-8 py-3 sm:py-4 rounded-2xl font-bold shadow-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-yellow-400/50 text-base sm:text-lg glow animate__animated animate__fadeInUp animate__delay-2s pointer-events-auto"
               style="position: relative; z-index: 60;">
                Mulai Sekarang
            </a>
        </div>
        <!-- Decorative SVG -->
        <svg class="absolute bottom-0 left-0 w-full h-20 sm:h-32 md:h-48 pointer-events-none" viewBox="0 0 1440 320"><path fill="#0f172a" fill-opacity="1" d="M0,224L60,197.3C120,171,240,117,360,117.3C480,117,600,171,720,197.3C840,224,960,224,1080,197.3C1200,171,1320,117,1380,90.7L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    </header>

    <!-- Features Section -->
    <section id="features" class="relative py-16 sm:py-24 px-4 sm:px-6 z-10">
        <h2 class="fade-in text-3xl sm:text-4xl font-extrabold text-center mb-10 sm:mb-16 gradient-text tracking-tight">Fitur Utama</h2>
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-10">
            <div class="fade-in glass p-6 sm:p-8 rounded-3xl shadow-2xl hover:shadow-blue-400/60 transition-all duration-500 transform hover:-translate-y-2 group">
                <div class="mb-4 flex justify-center">
                    <svg class="w-12 h-12 sm:w-14 sm:h-14 text-blue-400 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold mb-3 gradient-text">Manajemen Siswa</h3>
                <p class="text-gray-200 text-base sm:text-lg">Tambah, edit, hapus, dan lihat data siswa dengan panel admin yang modern dan intuitif.</p>
            </div>
            <div class="fade-in glass p-6 sm:p-8 rounded-3xl shadow-2xl hover:shadow-blue-400/60 transition-all duration-500 transform hover:-translate-y-2 group delay-100">
                <div class="mb-4 flex justify-center">
                    <svg class="w-12 h-12 sm:w-14 sm:h-14 text-yellow-400 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold mb-3 gradient-text">Filter & Cari Cepat</h3>
                <p class="text-gray-200 text-base sm:text-lg">Cari siswa berdasarkan nama, NISN, jurusan, atau angkatan dengan pencarian instan dan filter canggih.</p>
            </div>
            <div class="fade-in glass p-6 sm:p-8 rounded-3xl shadow-2xl hover:shadow-blue-400/60 transition-all duration-500 transform hover:-translate-y-2 group delay-200">
                <div class="mb-4 flex justify-center">
                    <svg class="w-12 h-12 sm:w-14 sm:h-14 text-indigo-400 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold mb-3 gradient-text">Data Lengkap</h3>
                <p class="text-gray-200 text-base sm:text-lg">Lihat informasi detail siswa, termasuk jurusan, angkatan, nomor HP, dan status aktif secara real-time.</p>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="relative py-16 sm:py-24 px-4 sm:px-6 bg-gray-900/80 z-10">
        <h2 class="fade-in text-3xl sm:text-4xl font-extrabold text-center mb-8 sm:mb-12 gradient-text tracking-tight">Tentang Siswatrack</h2>
        <div class="fade-in max-w-3xl mx-auto text-center text-gray-200 text-base sm:text-xl leading-relaxed">
            Siswatrack dirancang untuk sekolah dan instansi pendidikan yang ingin mempermudah manajemen data siswa secara modern. 
            <span class="gradient-text font-semibold">Desain elegan</span> dengan efek glassy, animasi halus, dan warna biru tua keemasan memberikan pengalaman visual yang memukau dan profesional. 
            <br><br>
            <span class="text-yellow-400 font-bold">Responsif</span> di semua perangkat, Siswatrack siap mendukung kebutuhan administrasi sekolah Anda.
        </div>
        <div class="absolute left-0 bottom-0 w-full h-16 sm:h-24 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 1440 320"><path fill="#1e293b" fill-opacity="1" d="M0,160L60,170.7C120,181,240,203,360,197.3C480,192,600,160,720,154.7C840,149,960,171,1080,186.7C1200,203,1320,213,1380,218.7L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
        </div>
    </section>

    <!-- Contact Section -->            
    <section id="contact" class="relative py-16 sm:py-24 px-4 sm:px-6 z-10">
        <h2 class="fade-in text-3xl sm:text-4xl font-extrabold text-center mb-8 sm:mb-12 gradient-text tracking-tight">Kontak</h2>
        <p class="fade-in max-w-3xl mx-auto text-center text-gray-200 mb-8 sm:mb-10 text-base sm:text-lg">Untuk pertanyaan, demo, atau kerjasama, hubungi kami melalui email atau telepon berikut:</p>
        <div class="fade-in flex flex-col sm:flex-row justify-center items-stretch gap-6 sm:gap-10 w-full max-w-3xl mx-auto">
            <div class="glass flex-1 p-6 sm:p-8 rounded-3xl shadow-2xl hover:shadow-yellow-400/40 transition-all duration-500 text-center min-w-[220px]">
                <div class="flex justify-center mb-3">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-yellow-400 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M16 12v1a4 4 0 01-8 0v-1m8 0a4 4 0 00-8 0m8 0V8a4 4 0 00-8 0v4m8 0H8"/></svg>
                </div>
                <h3 class="font-bold mb-2 text-lg sm:text-xl gradient-text">Email</h3>
                <p class="text-gray-200 break-all">admin@siswatrack.com</p>
            </div>
            <div class="glass flex-1 p-6 sm:p-8 rounded-3xl shadow-2xl hover:shadow-yellow-400/40 transition-all duration-500 text-center min-w-[220px]">
                <div class="flex justify-center mb-3">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-blue-400 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M3 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm0 12a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2zm12-12a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zm0 12a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                </div>
                <h3 class="font-bold mb-2 text-lg sm:text-xl gradient-text">Telepon</h3>
                <p class="text-gray-200 break-all">+62 812 3456 7890</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-6 text-center text-gray-400 border-t border-gray-700 text-sm sm:text-base">
        &copy; 2025 Siswatrack. All rights reserved.
    </footer>
</body>
</html>