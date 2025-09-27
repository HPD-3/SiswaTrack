<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Jurusan::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama_jurusan', 'like', "%{$search}%")
                ->orWhere('kode_jurusan', 'like', "%{$search}%");
        }

        $jurusans = $query->orderBy('nama_jurusan', 'asc')->paginate(10);
        return view('jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|max:255|unique:jurusans,kode_jurusan',
            'deskripsi' => 'nullable|string',
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'kode_jurusan' => $request->kode_jurusan,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurusan = Jurusan::with(['kelas', 'siswa'])->findOrFail($id);
        return view('jurusan.show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|max:255|unique:jurusans,kode_jurusan,'.$jurusan->id,
            'deskripsi' => 'nullable|string',
        ]);

        $jurusan->update([
            'nama_jurusan' => $request->nama_jurusan,
            'kode_jurusan' => $request->kode_jurusan,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil dihapus!');
    }
}
