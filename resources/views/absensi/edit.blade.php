@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('absensi.update', $absensi) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Siswa -->
                            <div>
                                <label for="siswa_id" class="block text-sm font-medium text-gray-700">Siswa *</label>
                                <select name="siswa_id" id="siswa_id"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        required>
                                    <option value="">Pilih Siswa</option>
                                    @foreach($siswa as $s)
                                    <option value="{{ $s->id }}" {{ old('siswa_id', $absensi->siswa_id) == $s->id ? 'selected' : '' }}>
                                        {{ $s->nama_lengkap }} ({{ $s->nisn }})
                                    </option>
                                    @endforeach
                                </select>
                                @error('siswa_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanggal -->
                            <div>
                                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal *</label>
                                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $absensi->tanggal->format('Y-m-d')) }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       required>
                                @error('tanggal')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                                <select name="status" id="status"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        required>
                                    <option value="">Pilih Status</option>
                                    <option value="hadir" {{ old('status', $absensi->status) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                    <option value="sakit" {{ old('status', $absensi->status) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                    <option value="izin" {{ old('status', $absensi->status) == 'izin' ? 'selected' : '' }}>Izin</option>
                                    <option value="alpa" {{ old('status', $absensi->status) == 'alpa' ? 'selected' : '' }}>Alpa</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Keterangan -->
                            <div>
                                <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="3"
                                          placeholder="Masukkan keterangan jika ada..."
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('keterangan', $absensi->keterangan) }}</textarea>
                                @error('keterangan')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Guru -->
                            <div>
                                <label for="guru_id" class="block text-sm font-medium text-gray-700">Guru</label>
                                <select name="guru_id" id="guru_id"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Pilih Guru</option>
                                    @foreach($guru as $g)
                                    <option value="{{ $g->id }}" {{ old('guru_id', $absensi->guru_id) == $g->id ? 'selected' : '' }}>
                                        {{ $g->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('guru_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end space-x-4 mt-6">
                            <a href="{{ route('absensi.index') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Batal
                            </a>
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
