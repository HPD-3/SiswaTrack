@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold text-white">Daftar Siswa</h1>
    <a href="{{ route('siswa.create') }}" 
       class="bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow-lg transition">
        ➕ Tambah Siswa
    </a>
</div>

@if($datasiswa->count())
    <table id="myTable" class="min-w-full text-sm text-left text-blue-100">
        <thead class="bg-blue-800/60">
            <tr>
                <th class="px-4 py-2">NISN</th>
                <th class="px-4 py-2">Nama Lengkap</th>
                <th class="px-4 py-2">Jurusan</th>
                <th class="px-4 py-2">Angkatan</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700">
            @foreach($datasiswa as $siswa)
            <tr>
                <td class="px-4 py-2">{{ $siswa->nisn }}</td>
                <td class="px-4 py-2">{{ $siswa->nama_lengkap }}</td>
                <td class="px-4 py-2">{{ $siswa->jurusan }}</td>
                <td class="px-4 py-2">{{ $siswa->angkatan }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('siswa.show', $siswa->id) }}" 
                       class="text-blue-400 hover:underline">👁️ Lihat</a>
                    <a href="{{ route('siswa.edit', $siswa->id) }}" 
                       class="text-yellow-400 hover:underline">✏️ Edit</a>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Yakin ingin menghapus?')" 
                                class="text-red-400 hover:underline">🗑️ Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p class="text-gray-400">Belum ada data siswa.</p>
@endif
@endsection
