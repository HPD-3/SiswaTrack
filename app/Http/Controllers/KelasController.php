<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kelas::with(['jurusan', 'waliKelas']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama_kelas', 'like', "%{$search}%")
                ->orWhere('tingkat', 'like', "%{$search}%")
                ->orWhereHas('jurusan', function($q) use ($search) {
                    $q->where('nama_jurusan', 'like', "%{$search}%");
                });
        }

        $kelas = $query->orderBy('nama_kelas', 'asc')->paginate(10);
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::where('is_active', true)->get();
        $teachers = User::where('role', 'teacher')->get();
        return view('kelas.create', compact('jurusans', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'wali_kelas_id' => 'nullable|exists:users,id',
            'deskripsi' => 'nullable|string',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'tingkat' => $request->tingkat,
            'jurusan_id' => $request->jurusan_id,
            'wali_kelas_id' => $request->wali_kelas_id,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::with(['jurusan', 'waliKelas', 'siswa'])->findOrFail($id);
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $jurusans = Jurusan::where('is_active', true)->get();
        $teachers = User::where('role', 'teacher')->get();
        return view('kelas.edit', compact('kelas', 'jurusans', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'wali_kelas_id' => 'nullable|exists:users,id',
            'deskripsi' => 'nullable|string',
        ]);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'tingkat' => $request->tingkat,
            'jurusan_id' => $request->jurusan_id,
            'wali_kelas_id' => $request->wali_kelas_id,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus!');
    }
}
