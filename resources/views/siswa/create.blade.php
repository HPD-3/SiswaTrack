@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-8">
    <!-- Card Form -->
    <div class="bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 
                rounded-2xl shadow-2xl border border-blue-800/40 
                backdrop-blur-lg p-8 text-blue-100">

        <h2 class="text-2xl font-bold mb-6 text-center text-white">Tambah Data Siswa</h2>

        <form action="{{ route('siswa.store') }}" method="POST" class="space-y-5">
            @csrf
            <!-- NISN -->
            <div>
                <label for="nisn" class="block text-sm font-semibold mb-2">NISN</label>
                <input type="text" name="nisn" 
                       class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                              focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                              hover:bg-gray-700/80 transition-all" required>
            </div>

            <!-- Nama Lengkap -->
            <div>
                <label for="nama_lengkap" class="block text-sm font-semibold mb-2">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" 
                       class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                              focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                              hover:bg-gray-700/80 transition-all" required>
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label for="tangal_lahir" class="block text-sm font-semibold mb-2">Tanggal Lahir</label>
                <input type="date" name="tangal_lahir" 
                       class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                              focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                              hover:bg-gray-700/80 transition-all" required>
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-sm font-semibold mb-2">Alamat</label>
                <textarea name="alamat" rows="3"
                          class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                                 focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                                 hover:bg-gray-700/80 transition-all" required></textarea>
            </div>

            <!-- Jurusan -->
            <div>
                <label for="jurusan" class="block text-sm font-semibold mb-2">Jurusan</label>
                <select name="jurusan" 
                        class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                               hover:bg-gray-700/80 transition-all" required>
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="PPLG">PPLG</option>
                    <option value="BC">BC</option>
                    <option value="ANIMASI">ANIMASI</option>
                    <option value="TFL">TFL</option>
                    <option value="TO">TO</option>
                </select>
            </div>

            <!-- Angkatan -->
            <div>
                <label for="angkatan" class="block text-sm font-semibold mb-2">Angkatan</label>
                <input type="text" name="angkatan" 
                       class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                              focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                              hover:bg-gray-700/80 transition-all" required>
            </div>

            <!-- No HP -->
            <div>
                <label for="no_hp" class="block text-sm font-semibold mb-2">No HP</label>
                <input type="text" name="no_hp" 
                       class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                              focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                              hover:bg-gray-700/80 transition-all" required>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end">
                <button type="submit" 
                        class="px-6 py-2 bg-blue-700 hover:bg-blue-600 text-white font-semibold 
                               rounded-lg shadow-lg transition transform hover:scale-105">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
