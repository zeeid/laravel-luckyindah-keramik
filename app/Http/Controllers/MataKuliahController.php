<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MataKuliahController extends Controller
{
    public function index() {
        $matakuliah = MataKuliah::all();
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create() {
        return view('matakuliah.form');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'kode_mata_kuliah' => 'required|unique:mata_kuliahs|max:10',
            'nama_mata_kuliah' => 'required|string|max:100',
            'dosen' => 'required|string|max:100',
            'jurusan' => 'required',
        ]);

        $validated['kode_mata_kuliah'] = strip_tags($request->kode_mata_kuliah);
        $validated['nama_mata_kuliah'] = strip_tags($request->nama_mata_kuliah);
        $validated['dosen'] = strip_tags($request->dosen);

        MataKuliah::create($validated);
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah ditambahkan');
    }

    public function edit($id) {
        $matakuliah = MataKuliah::findOrFail($id);
        return view('matakuliah.form', compact('matakuliah'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'nama_mata_kuliah' => 'required|string|max:100',
            'dosen' => 'required|string|max:100',
            'jurusan' => 'required',
        ]);

        $validated['nama_mata_kuliah'] = strip_tags($request->nama_mata_kuliah);
        $validated['dosen'] = strip_tags($request->dosen);

        MataKuliah::findOrFail($id)->update($validated);
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah diupdate');
    }

    public function destroy($id) {
        MataKuliah::findOrFail($id)->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah dihapus');
    }
}
