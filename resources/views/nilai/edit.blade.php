@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('nilai.update', $nilai) }}">
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
                                    <option value="{{ $s->id }}" {{ old('siswa_id', $nilai->siswa_id) == $s->id ? 'selected' : '' }}>
                                        {{ $s->nama_lengkap }} ({{ $s->nisn }})
                                    </option>
                                    @endforeach
                                </select>
                                @error('siswa_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Mata Pelajaran -->
                            <div>
                                <label for="mata_pelajaran" class="block text-sm font-medium text-gray-700">Mata Pelajaran *</label>
                                <input type="text" name="mata_pelajaran" id="mata_pelajaran" value="{{ old('mata_pelajaran', $nilai->mata_pelajaran) }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       required>
                                @error('mata_pelajaran')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nilai -->
                            <div>
                                <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai *</label>
                                <input type="number" name="nilai" id="nilai" value="{{ old('nilai', $nilai->nilai) }}" 
                                       min="0" max="100" step="0.01"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       required>
                                @error('nilai')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Jenis Nilai -->
                            <div>
                                <label for="jenis_nilai" class="block text-sm font-medium text-gray-700">Jenis Nilai *</label>
                                <select name="jenis_nilai" id="jenis_nilai"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        required>
                                    <option value="">Pilih Jenis Nilai</option>
                                    <option value="tugas" {{ old('jenis_nilai', $nilai->jenis_nilai) == 'tugas' ? 'selected' : '' }}>Tugas</option>
                                    <option value="uts" {{ old('jenis_nilai', $nilai->jenis_nilai) == 'uts' ? 'selected' : '' }}>UTS</option>
                                    <option value="uas" {{ old('jenis_nilai', $nilai->jenis_nilai) == 'uas' ? 'selected' : '' }}>UAS</option>
                                    <option value="praktik" {{ old('jenis_nilai', $nilai->jenis_nilai) == 'praktik' ? 'selected' : '' }}>Praktik</option>
                                </select>
                                @error('jenis_nilai')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Semester -->
                            <div>
                                <label for="semester" class="block text-sm font-medium text-gray-700">Semester *</label>
                                <select name="semester" id="semester"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        required>
                                    <option value="">Pilih Semester</option>
                                    <option value="1" {{ old('semester', $nilai->semester) == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('semester', $nilai->semester) == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('semester', $nilai->semester) == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('semester', $nilai->semester) == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('semester', $nilai->semester) == '5' ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ old('semester', $nilai->semester) == '6' ? 'selected' : '' }}>6</option>
                                </select>
                                @error('semester')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tahun Ajaran -->
                            <div>
                                <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700">Tahun Ajaran *</label>
                                <input type="text" name="tahun_ajaran" id="tahun_ajaran" value="{{ old('tahun_ajaran', $nilai->tahun_ajaran) }}"
                                       placeholder="Contoh: 2023/2024"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       required>
                                @error('tahun_ajaran')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Keterangan -->
                            <div>
                                <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="3"
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('keterangan', $nilai->keterangan) }}</textarea>
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
                                    <option value="{{ $g->id }}" {{ old('guru_id', $nilai->guru_id) == $g->id ? 'selected' : '' }}>
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
                            <a href="{{ route('nilai.index') }}" 
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
