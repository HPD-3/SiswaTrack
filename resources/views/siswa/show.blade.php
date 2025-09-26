@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold text-white mb-4">Detail Siswa</h1>

<div class="bg-gray-800 p-6 rounded-lg shadow-lg space-y-3">
    <p><strong>NISN:</strong> {{ $siswa->nisn }}</p>
    <p><strong>Nama Lengkap:</strong> {{ $siswa->nama_lengkap }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $siswa->tanggal_lahir }}</p>
    <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
    <p><strong>Jurusan:</strong> {{ $siswa->jurusan }}</p>
    <p><strong>Angkatan:</strong> {{ $siswa->angkatan }}</p>
    <p><strong>No HP:</strong> {{ $siswa->no_hp }}</p>
    <p><strong>Status Aktif:</strong> {{ $siswa->is_active ? 'Aktif' : 'Tidak Aktif' }}</p>
</div>

<div class="mt-4 flex space-x-2">
    <a href="{{ route('siswa.index') }}" 
       class="bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">⬅️ Kembali</a>
    <a href="{{ route('siswa.edit', $siswa->id) }}" 
       class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">✏️ Edit</a>
</div>
@endsection
