<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $mataKuliahs = MataKuliah::all();
        return view('admin.mata_kuliah.index', compact('mataKuliahs'));
    }

    // Form tambah
    public function create()
    {
        return view('admin.mata_kuliah.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:mata_kuliahs,kode',
            'nama' => 'required',
            'sks' => 'required|integer',
            'dosen_pengampu' => 'nullable',
        ]);
        MataKuliah::create($validated);
        return redirect()->route('admin.mata-kuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan!');
    }

    // Form edit
    public function edit(MataKuliah $mata_kuliah)
    {
        return view('admin.mata_kuliah.edit', compact('mata_kuliah'));
    }

    // Update data
    public function update(Request $request, MataKuliah $mata_kuliah)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:mata_kuliahs,kode,' . $mata_kuliah->id,
            'nama' => 'required',
            'sks' => 'required|integer',
            'dosen_pengampu' => 'nullable',
        ]);
        $mata_kuliah->update($validated);
        return redirect()->route('admin.mata-kuliah.index')->with('success', 'Mata kuliah berhasil diupdate!');
    }

    // Hapus data
    public function destroy(MataKuliah $mata_kuliah)
    {
        $mata_kuliah->delete();
        return redirect()->route('admin.mata-kuliah.index')->with('success', 'Mata kuliah berhasil dihapus!');
    }

    public function show(MataKuliah $mata_kuliah)
    {
        return view('admin.mata_kuliah.show', compact('mata_kuliah'));
    }
}
