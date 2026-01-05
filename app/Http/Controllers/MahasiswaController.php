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
        return view('mahasiswa.form', compact('jenisKelamin'));
    }

    public function store(Request $request) {
        $request->validate([
            'm_id' => 'required|unique:mahasiswas|max:10',
            'nim' => 'required|unique:mahasiswas|max:20',
            'nama_mahasiswa' => 'required',
            'kode_jenis_kelamin' => 'required',
            'jurusan' => 'required',
            'ipk' => 'required|numeric|between:0,4.00',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Ditambahkan');
    }

    public function edit($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jenisKelamin = JenisKelamin::all();
        return view('mahasiswa.form', compact('mahasiswa', 'jenisKelamin'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            // Ignore unique check untuk record ini
            'nim' => 'required|max:20|unique:mahasiswas,nim,'.$id.',m_id',
            'nama_mahasiswa' => 'required',
            'kode_jenis_kelamin' => 'required',
            'jurusan' => 'required',
            'ipk' => 'required|numeric|between:0,4.00',
        ]);

        Mahasiswa::findOrFail($id)->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Diupdate');
    }

    public function destroy($id) {
        Mahasiswa::findOrFail($id)->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa dihapus');
    }
}
