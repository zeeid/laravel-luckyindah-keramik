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
        return view('matakuliah.create');
    }

    public function store(Request $request) {
        $request->validate(['kode_mata_kuliah' => 'required|unique:mata_kuliahs', 'nama_mata_kuliah' => 'required']);
        MataKuliah::create($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah ditambahkan');
    }

    public function edit($id) {
        $matakuliah = MataKuliah::findOrFail($id);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, $id) {
        MataKuliah::findOrFail($id)->update($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah diupdate');
    }

    public function destroy($id) {
        MataKuliah::findOrFail($id)->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah dihapus');
    }
}
