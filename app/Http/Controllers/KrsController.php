<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KrsController extends Controller
{
    public function index() {
        $krs = Krs::with(['mahasiswa', 'mataKuliah'])->get();
        return view('krs.index', compact('krs'));
    }

    public function create() {
        $mahasiswa = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        return view('krs.create', compact('mahasiswa', 'matakuliah'));
    }

    public function store(Request $request) {
        // Validasi agar tidak duplikat
        $cek = Krs::where('m_id', $request->m_id)
                  ->where('kode_mata_kuliah', $request->kode_mata_kuliah)
                  ->exists();
                  
        if($cek) return back()->withErrors(['msg' => 'Data KRS ini sudah ada!']);

        Krs::create($request->all());
        return redirect()->route('krs.index')->with('success', 'KRS Berhasil Diambil');
    }

    // UPDATE: Update SKS saja, karena PK (M# dan Kode MK) tidak lazim diubah di tabel pivot
    public function edit($m_id, $kode_mk) {
        $krs = Krs::where('m_id', $m_id)->where('kode_mata_kuliah', $kode_mk)->firstOrFail();
        return view('krs.edit', compact('krs'));
    }

    public function update(Request $request, $m_id, $kode_mk) {
        Krs::where('m_id', $m_id)->where('kode_mata_kuliah', $kode_mk)
           ->update(['sks' => $request->sks]);
           
        return redirect()->route('krs.index')->with('success', 'SKS Berhasil Diupdate');
    }

    public function destroy($m_id, $kode_mk) {
        Krs::where('m_id', $m_id)->where('kode_mata_kuliah', $kode_mk)->delete();
        return redirect()->route('krs.index')->with('success', 'Data KRS Dihapus');
    }
}
