@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-extrabold text-white tracking-tight">Daftar Siswa</h1>
    <a href="{{ route('siswa.create') }}" 
       class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-700 to-blue-500 hover:from-blue-600 hover:to-blue-400 text-white px-6 py-2 rounded-xl shadow-lg transition-all duration-200 font-semibold text-base">
        <span class="text-xl">➕</span> Tambah Siswa
    </a>
</div>

@if($datasiswa->count())
    <div class="overflow-x-auto rounded-xl shadow-2xl bg-gradient-to-br from-gray-900/80 to-blue-900/60">
        <table id="myTable" class="min-w-full text-sm text-left text-blue-100">
            <thead>
                <tr class="bg-gradient-to-r from-blue-800/80 to-blue-700/60">
                    <th class="px-6 py-4 font-semibold uppercase tracking-wider">NISN</th>
                    <th class="px-6 py-4 font-semibold uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-6 py-4 font-semibold uppercase tracking-wider">Jurusan</th>
                    <th class="px-6 py-4 font-semibold uppercase tracking-wider">Angkatan</th>
                    <th class="px-6 py-4 font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-800/40">
                @foreach($datasiswa as $siswa)
                <tr class="hover:bg-blue-800/30 transition-colors">
                    <td class="px-6 py-4">{{ $siswa->nisn }}</td>
                    <td class="px-6 py-4 font-medium text-white">{{ $siswa->nama_lengkap }}</td>
                    <td class="px-6 py-4">{{ $siswa->jurusan }}</td>
                    <td class="px-6 py-4">{{ $siswa->angkatan }}</td>
                    <td class="px-6 py-4 flex gap-2">
                        <a href="{{ route('siswa.show', $siswa->id) }}" 
                           class="inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-blue-600/80 hover:bg-blue-500 text-white font-semibold shadow transition-all duration-150"
                           title="Lihat">
                            <span class="text-lg">👁️</span> <span class="hidden md:inline">Lihat</span>
                        </a>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" 
                           class="inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-yellow-500/80 hover:bg-yellow-400 text-white font-semibold shadow transition-all duration-150"
                           title="Edit">
                            <span class="text-lg">✏️</span> <span class="hidden md:inline">Edit</span>
                        </a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Yakin ingin menghapus?')" 
                                    class="inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-red-600/80 hover:bg-red-500 text-white font-semibold shadow transition-all duration-150"
                                    title="Hapus">
                                <span class="text-lg">🗑️</span> <span class="hidden md:inline">Hapus</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="flex flex-col items-center justify-center py-16">
        <svg class="w-16 h-16 text-gray-500 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"></path>
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" fill="none"></circle>
        </svg>
        <p class="text-gray-400 text-lg">Belum ada data siswa.</p>
    </div>
@endif
@endsection
