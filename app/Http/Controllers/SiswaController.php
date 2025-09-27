<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Siswa::with(['jurusan', 'kelas', 'teacher']);

        // Role-based filtering
        if (auth()->user()->isTeacher()) {
            $query->where('teacher_id', auth()->id());
        }

        // kalau ada parameter search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nisn', 'like', "%{$search}%")
                ->orWhere('nama_lengkap', 'like', "%{$search}%")
                ->orWhere('angkatan', 'like', "%{$search}%")
                ->orWhere('no_hp', 'like', "%{$search}%")
                ->orWhereHas('jurusan', function($q) use ($search) {
                    $q->where('nama_jurusan', 'like', "%{$search}%");
                })
                ->orWhereHas('kelas', function($q) use ($search) {
                    $q->where('nama_kelas', 'like', "%{$search}%");
                });
        }

        // bisa ditambah paginate biar rapi
        $datasiswa = $query->orderBy('nama_lengkap', 'asc')->paginate(10);

        return view('siswa.index', compact('datasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::where('is_active', true)->get();
        $kelas = Kelas::where('is_active', true)->get();
        $teachers = User::where('role', 'teacher')->get();
        return view('siswa.create', compact('jurusans', 'kelas', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:siswas,nisn',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'kelas_id' => 'nullable|exists:kelas,id',
            'angkatan' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'teacher_id' => 'nullable|exists:users,id',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jurusan_id' => $request->jurusan_id,
            'kelas_id' => $request->kelas_id,
            'angkatan' => $request->angkatan,
            'no_hp' => $request->no_hp,
            'added_by' => auth()->id(),
            'teacher_id' => $request->teacher_id,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::with(['jurusan', 'kelas', 'teacher', 'addedBy', 'nilai', 'absensi'])->findOrFail($id);

        return view('siswa.show', compact('siswa'));
    }

    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $jurusans = Jurusan::where('is_active', true)->get();
        $kelas = Kelas::where('is_active', true)->get();
        $teachers = User::where('role', 'teacher')->get();
        return view('siswa.edit', compact('siswa', 'jurusans', 'kelas', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nisn' => 'required|unique:siswas,nisn,'.$siswa->id,
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'kelas_id' => 'nullable|exists:kelas,id',
            'angkatan' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'teacher_id' => 'nullable|exists:users,id',
        ]);

        $siswa->update([
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jurusan_id' => $request->jurusan_id,
            'kelas_id' => $request->kelas_id,
            'angkatan' => $request->angkatan,
            'no_hp' => $request->no_hp,
            'teacher_id' => $request->teacher_id,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
