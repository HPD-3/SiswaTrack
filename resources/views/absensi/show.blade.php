@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Header with Edit Button -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Detail Absensi</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('absensi.edit', $absensi) }}" 
                               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <a href="{{ route('absensi.index') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Kembali
                            </a>
                        </div>
                    </div>

                    <!-- Detail Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Siswa</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $absensi->siswa->nama_lengkap }}</p>
                            <p class="text-xs text-gray-500">NISN: {{ $absensi->siswa->nisn }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $absensi->tanggal->format('d/m/Y') }}</p>
                            <p class="text-xs text-gray-500">{{ $absensi->tanggal->format('l, d F Y') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <p class="mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    @if($absensi->status == 'hadir') bg-green-100 text-green-800
                                    @elseif($absensi->status == 'sakit') bg-yellow-100 text-yellow-800
                                    @elseif($absensi->status == 'izin') bg-blue-100 text-blue-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ ucfirst($absensi->status) }}
                                </span>
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Guru</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $absensi->guru->name ?? 'Tidak ada guru' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Dibuat</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $absensi->created_at->format('d/m/Y H:i') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Diperbarui</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $absensi->updated_at->format('d/m/Y H:i') }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $absensi->keterangan ?: 'Tidak ada keterangan' }}</p>
                        </div>
                    </div>

                    <!-- Status Analysis -->
                    <div class="mt-8">
                        <h4 class="text-lg font-medium text-gray-900 mb-4">Analisis Status</h4>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold 
                                        @if($absensi->status == 'hadir') text-green-600
                                        @elseif($absensi->status == 'sakit') text-yellow-600
                                        @elseif($absensi->status == 'izin') text-blue-600
                                        @else text-red-600
                                        @endif">
                                        @if($absensi->status == 'hadir') ✓
                                        @elseif($absensi->status == 'sakit') 🏥
                                        @elseif($absensi->status == 'izin') 📝
                                        @else ✗
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500">Status</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-900">
                                        {{ $absensi->tanggal->diffInDays(now()) }}
                                    </div>
                                    <div class="text-sm text-gray-500">Hari yang lalu</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-900">
                                        {{ $absensi->tanggal->format('W') }}
                                    </div>
                                    <div class="text-sm text-gray-500">Minggu ke</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-900">
                                        {{ $absensi->tanggal->format('z') }}
                                    </div>
                                    <div class="text-sm text-gray-500">Hari dalam tahun</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Student Info -->
                    <div class="mt-8">
                        <h4 class="text-lg font-medium text-gray-900 mb-4">Informasi Siswa</h4>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Kelas</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $absensi->siswa->kelas->nama_kelas ?? 'Tidak ada kelas' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Jurusan</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $absensi->siswa->jurusan->nama_jurusan ?? 'Tidak ada jurusan' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Angkatan</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $absensi->siswa->angkatan ?? 'Tidak ada angkatan' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Wali Kelas</p>
                                    <p class="text-sm font-medium text-gray-900">{{ $absensi->siswa->teacher->name ?? 'Tidak ada wali kelas' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
