@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Header with Edit Button -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-900">Detail Jurusan</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('jurusan.edit', $jurusan) }}" 
                               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <a href="{{ route('jurusan.index') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Kembali
                            </a>
                        </div>
                    </div>

                    <!-- Detail Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Jurusan</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $jurusan->nama_jurusan }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kode Jurusan</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $jurusan->kode_jurusan }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <p class="mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    {{ $jurusan->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $jurusan->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Dibuat</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $jurusan->created_at->format('d/m/Y H:i') }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $jurusan->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                        </div>
                    </div>

                    <!-- Related Data -->
                    @if($jurusan->kelas->count() > 0 || $jurusan->siswa->count() > 0)
                    <div class="mt-8">
                        <h4 class="text-lg font-medium text-gray-900 mb-4">Data Terkait</h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kelas -->
                            @if($jurusan->kelas->count() > 0)
                            <div>
                                <h5 class="text-md font-medium text-gray-700 mb-2">Kelas ({{ $jurusan->kelas->count() }})</h5>
                                <div class="space-y-2">
                                    @foreach($jurusan->kelas as $kelas)
                                    <div class="bg-gray-50 p-3 rounded-md">
                                        <p class="text-sm font-medium text-gray-900">{{ $kelas->nama_kelas }}</p>
                                        <p class="text-xs text-gray-500">Tingkat: {{ $kelas->tingkat }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Siswa -->
                            @if($jurusan->siswa->count() > 0)
                            <div>
                                <h5 class="text-md font-medium text-gray-700 mb-2">Siswa ({{ $jurusan->siswa->count() }})</h5>
                                <div class="space-y-2">
                                    @foreach($jurusan->siswa->take(5) as $siswa)
                                    <div class="bg-gray-50 p-3 rounded-md">
                                        <p class="text-sm font-medium text-gray-900">{{ $siswa->nama_lengkap }}</p>
                                        <p class="text-xs text-gray-500">NISN: {{ $siswa->nisn }}</p>
                                    </div>
                                    @endforeach
                                    @if($jurusan->siswa->count() > 5)
                                    <p class="text-xs text-gray-500">... dan {{ $jurusan->siswa->count() - 5 }} siswa lainnya</p>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
