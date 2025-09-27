<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md mx-auto bg-blue-900/80 rounded-2xl shadow-2xl p-8 border border-blue-700/40 backdrop-blur-md">
        <div class="mb-8 text-center">
            <svg class="mx-auto w-16 h-16 text-blue-400" fill="none" viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="22" stroke="currentColor" stroke-width="4" fill="none"/>
                <text x="50%" y="56%" text-anchor="middle" fill="currentColor" font-size="20" font-family="Arial" dy=".3em">{{ strtoupper(substr(config('app.name', 'L'), 0, 1)) }}</text>
            </svg>
            <h2 class="mt-4 text-2xl font-extrabold text-blue-200 tracking-tight">Daftar Akun Baru</h2>
            <p class="mt-1 text-blue-100/80">Silakan isi data di bawah untuk mendaftar</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-blue-200 font-semibold">Nama</label>
                <input 
                    id="name" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="Nama lengkap"
                    class="mt-1 block w-full rounded-lg bg-gray-800/70 border border-blue-700/40 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 py-2 px-3"
                >
                @error('name')
                    <div class="mt-2 text-red-400 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-blue-200 font-semibold">Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="username"
                    placeholder="you@email.com"
                    class="mt-1 block w-full rounded-lg bg-gray-800/70 border border-blue-700/40 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 py-2 px-3"
                >
                @error('email')
                    <div class="mt-2 text-red-400 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-blue-200 font-semibold">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password"
                    placeholder="••••••••"
                    class="mt-1 block w-full rounded-lg bg-gray-800/70 border border-blue-700/40 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 py-2 px-3"
                >
                @error('password')
                    <div class="mt-2 text-red-400 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-blue-200 font-semibold">Konfirmasi Password</label>
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    placeholder="Ulangi password"
                    class="mt-1 block w-full rounded-lg bg-gray-800/70 border border-blue-700/40 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 py-2 px-3"
                >
                @error('password_confirmation')
                    <div class="mt-2 text-red-400 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a class="text-sm text-blue-300 hover:text-yellow-400 transition font-semibold" href="{{ route('login') }}">
                    Sudah punya akun?
                </a>
                <button type="submit" class="bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-500 transition text-lg py-2 px-6 rounded-xl text-white font-bold shadow-lg">
                    Daftar
                </button>
            </div>
        </form>
    </div>
</body>
</html>
