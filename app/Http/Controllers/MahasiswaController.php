<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\JenisKelamin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MahasiswaController extends Controller
{
    public function index() {
        $mahasiswa = Mahasiswa::with('jenisKelamin')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create() {
        $jenisKelamin = JenisKelamin::all();
        return view('mahasiswa.create', compact('jenisKelamin'));
    }

    public function store(Request $request) {
        $request->validate(['m_id' => 'required|unique:mahasiswas', 'nim' => 'required|unique:mahasiswas', 'nama_mahasiswa' => 'required']);
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa ditambahkan');
    }

    public function edit($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jenisKelamin = JenisKelamin::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'jenisKelamin'));
    }

    public function update(Request $request, $id) {
        Mahasiswa::findOrFail($id)->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa diupdate');
    }

    public function destroy($id) {
        Mahasiswa::findOrFail($id)->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa dihapus');
    }
}
