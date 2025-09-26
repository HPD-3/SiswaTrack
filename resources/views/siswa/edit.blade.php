@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-8">
    <!-- Card -->
    <div class="bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 
                rounded-2xl shadow-2xl border border-blue-800/40 
                backdrop-blur-lg p-8 text-blue-100">

        <h1 class="text-2xl font-bold text-white mb-6 text-center">Edit Data Siswa</h1>

        <form method="POST" action="{{ route('siswa.update', $siswa->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- NISN -->
            <div>
                <label class="block text-sm font-semibold mb-2">NISN</label>
                <input type="text" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" 
                       class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                              focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                              hover:bg-gray-700/80 transition-all">
            </div>

            <!-- Nama Lengkap -->
            <div>
                <label class="block text-sm font-semibold mb-2">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $siswa->nama_lengkap) }}" 
                       class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                              focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                              hover:bg-gray-700/80 transition-all">
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label class="block text-sm font-semibold mb-2">Tanggal Lahir</label>
                <input type="date" name="tangal_lahir" value="{{ old('tangal_lahir', $siswa->tangal_lahir) }}" 
                       class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                              focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                              hover:bg-gray-700/80 transition-all">
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-sm font-semibold mb-2">Alamat</label>
                <textarea name="alamat" rows="3" 
                          class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                                 focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                                 hover:bg-gray-700/80 transition-all">{{ old('alamat', $siswa->alamat) }}</textarea>
            </div>

            <!-- Jurusan -->
            <div>
                <label class="block text-sm font-semibold mb-2">Jurusan</label>
                <select name="jurusan" 
                        class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                               hover:bg-gray-700/80 transition-all">
                    <option value="PPLG" {{ old('jurusan', $siswa->jurusan) == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                    <option value="BC" {{ old('jurusan', $siswa->jurusan) == 'BC' ? 'selected' : '' }}>BC</option>
                    <option value="ANIMASI" {{ old('jurusan', $siswa->jurusan) == 'ANIMASI' ? 'selected' : '' }}>ANIMASI</option>
                    <option value="TFL" {{ old('jurusan', $siswa->jurusan) == 'TFL' ? 'selected' : '' }}>TFL</option>
                    <option value="TO" {{ old('jurusan', $siswa->jurusan) == 'TO' ? 'selected' : '' }}>TO</option>
                </select>
            </div>

            <!-- Angkatan -->
            <div>
                <label class="block text-sm font-semibold mb-2">Angkatan</label>
                <input type="text" name="angkatan" value="{{ old('angkatan', $siswa->angkatan) }}" 
                       class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                              focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                              hover:bg-gray-700/80 transition-all">
            </div>

            <!-- No HP -->
            <div>
                <label class="block text-sm font-semibold mb-2">No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $siswa->no_hp) }}" 
                       class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                              focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                              hover:bg-gray-700/80 transition-all">
            </div>

            <!-- Status Aktif -->
            <div>
                <label class="block text-sm font-semibold mb-2">Status Aktif</label>
                <select name="is_active" 
                        class="w-full px-4 py-2 rounded-lg bg-gray-800/70 border border-gray-600 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none text-white
                               hover:bg-gray-700/80 transition-all">
                    <option value="1" {{ $siswa->is_active ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ !$siswa->is_active ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end">
                <button type="submit" 
                        class="px-6 py-2 bg-yellow-600 hover:bg-yellow-500 text-white font-semibold 
                               rounded-lg shadow-lg transition transform hover:scale-105">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
