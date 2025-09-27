@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Siswa</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $totalSiswa }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Siswa Aktif</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $siswaAktif }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-red-500 rounded-md flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Siswa Tidak Aktif</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $siswaTidakAktif }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-purple-500 rounded-md flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Kelas</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $totalKelas }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Students per Major Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Siswa per Jurusan</h3>
                        <div class="space-y-3">
                            @foreach($siswaPerJurusan as $jurusan)
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">{{ $jurusan->nama_jurusan }}</span>
                                <div class="flex items-center">
                                    <div class="w-32 bg-gray-200 rounded-full h-2 mr-3">
                                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $totalSiswa > 0 ? ($jurusan->siswa_count / $totalSiswa) * 100 : 0 }}%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">{{ $jurusan->siswa_count }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Students per Batch Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Siswa per Angkatan</h3>
                        <div class="space-y-3">
                            @foreach($siswaPerAngkatan as $angkatan)
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">{{ $angkatan->angkatan }}</span>
                                <div class="flex items-center">
                                    <div class="w-32 bg-gray-200 rounded-full h-2 mr-3">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: {{ $totalSiswa > 0 ? ($angkatan->total / $totalSiswa) * 100 : 0 }}%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">{{ $angkatan->total }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Students -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Siswa Terbaru</h3>
                        <div class="space-y-3">
                            @forelse($siswaTerbaru as $siswa)
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                        <span class="text-sm font-medium text-gray-700">{{ substr($siswa->nama_lengkap, 0, 1) }}</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ $siswa->nama_lengkap }}</p>
                                    <p class="text-sm text-gray-500">{{ $siswa->jurusan->nama_jurusan ?? 'Tidak ada jurusan' }}</p>
                                </div>
                            </div>
                            @empty
                            <p class="text-sm text-gray-500">Tidak ada data siswa</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Recent Grades -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Nilai Terbaru</h3>
                        <div class="space-y-3">
                            @forelse($nilaiTerbaru as $nilai)
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $nilai->siswa->nama_lengkap }}</p>
                                    <p class="text-sm text-gray-500">{{ $nilai->mata_pelajaran }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-medium text-gray-900">{{ $nilai->nilai }}</p>
                                    <p class="text-xs text-gray-500">{{ $nilai->jenis_nilai }}</p>
                                </div>
                            </div>
                            @empty
                            <p class="text-sm text-gray-500">Tidak ada data nilai</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Today's Attendance -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Absensi Hari Ini</h3>
                        <div class="space-y-3">
                            @forelse($absensiHariIni as $absensi)
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $absensi->siswa->nama_lengkap }}</p>
                                    <p class="text-sm text-gray-500">{{ $absensi->tanggal->format('d/m/Y') }}</p>
                                </div>
                                <div class="text-right">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($absensi->status == 'hadir') bg-green-100 text-green-800
                                        @elseif($absensi->status == 'sakit') bg-yellow-100 text-yellow-800
                                        @elseif($absensi->status == 'izin') bg-blue-100 text-blue-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($absensi->status) }}
                                    </span>
                                </div>
                            </div>
                            @empty
                            <p class="text-sm text-gray-500">Tidak ada data absensi hari ini</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
