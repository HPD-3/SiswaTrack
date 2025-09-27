@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Header with Edit Button -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Detail Nilai</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('nilai.edit', $nilai) }}" 
                               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <a href="{{ route('nilai.index') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Kembali
                            </a>
                        </div>
                    </div>

                    <!-- Detail Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Siswa</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $nilai->siswa->nama_lengkap }}</p>
                            <p class="text-xs text-gray-500">NISN: {{ $nilai->siswa->nisn }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $nilai->mata_pelajaran }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nilai</label>
                            <p class="mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    @if($nilai->nilai >= 85) bg-green-100 text-green-800
                                    @elseif($nilai->nilai >= 70) bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ $nilai->nilai }}
                                </span>
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jenis Nilai</label>
                            <p class="mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($nilai->jenis_nilai == 'uas') bg-blue-100 text-blue-800
                                    @elseif($nilai->jenis_nilai == 'uts') bg-purple-100 text-purple-800
                                    @elseif($nilai->jenis_nilai == 'tugas') bg-green-100 text-green-800
                                    @else bg-orange-100 text-orange-800
                                    @endif">
                                    {{ ucfirst($nilai->jenis_nilai) }}
                                </span>
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Semester</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $nilai->semester }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tahun Ajaran</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $nilai->tahun_ajaran }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Guru</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $nilai->guru->name ?? 'Tidak ada guru' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Dibuat</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $nilai->created_at->format('d/m/Y H:i') }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $nilai->keterangan ?: 'Tidak ada keterangan' }}</p>
                        </div>
                    </div>

                    <!-- Grade Analysis -->
                    <div class="mt-8">
                        <h4 class="text-lg font-medium text-gray-900 mb-4">Analisis Nilai</h4>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-900">{{ $nilai->nilai }}</div>
                                    <div class="text-sm text-gray-500">Nilai</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold 
                                        @if($nilai->nilai >= 85) text-green-600
                                        @elseif($nilai->nilai >= 70) text-yellow-600
                                        @else text-red-600
                                        @endif">
                                        @if($nilai->nilai >= 85) A
                                        @elseif($nilai->nilai >= 80) B+
                                        @elseif($nilai->nilai >= 75) B
                                        @elseif($nilai->nilai >= 70) C+
                                        @elseif($nilai->nilai >= 65) C
                                        @elseif($nilai->nilai >= 60) D
                                        @else E
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500">Predikat</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold 
                                        @if($nilai->nilai >= 85) text-green-600
                                        @elseif($nilai->nilai >= 70) text-yellow-600
                                        @else text-red-600
                                        @endif">
                                        @if($nilai->nilai >= 85) Sangat Baik
                                        @elseif($nilai->nilai >= 70) Baik
                                        @else Perlu Perbaikan
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500">Keterangan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
