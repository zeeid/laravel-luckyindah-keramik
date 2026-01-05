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
        return view('krs.form', compact('mahasiswa', 'matakuliah'));
    }

    public function store(Request $request) {
        $request->validate([
            'm_id' => 'required',
            'kode_mata_kuliah' => 'required',
            'sks' => 'required|integer|min:1'
        ]);

        // Cek duplikasi Primary Key
        $exists = Krs::where('m_id', $request->m_id)
                     ->where('kode_mata_kuliah', $request->kode_mata_kuliah)
                     ->exists();
                     
        if($exists) {
            return back()->withErrors(['msg' => 'Mahasiswa ini sudah mengambil mata kuliah tersebut!']);
        }

        Krs::create($request->all());
        return redirect()->route('krs.index')->with('success', 'KRS Berhasil Diambil');
    }

    public function edit($m_id, $kode_mk) {
        // Cari data spesifik dengan 2 kunci
        $krs = Krs::where('m_id', $m_id)->where('kode_mata_kuliah', $kode_mk)->firstOrFail();
        $mahasiswa = Mahasiswa::all();
        $matakuliah = MataKuliah::all();

        return view('krs.form', compact('krs', 'mahasiswa', 'matakuliah'));
    }

    public function update(Request $request, $m_id, $kode_mk) {
        $request->validate(['sks' => 'required|integer|min:1']);

        Krs::where('m_id', $m_id)
           ->where('kode_mata_kuliah', $kode_mk)
           ->update(['sks' => $request->sks]);

        return redirect()->route('krs.index')->with('success', 'SKS Berhasil Diupdate');
    }

    public function destroy($m_id, $kode_mk) {
        Krs::where('m_id', $m_id)->where('kode_mata_kuliah', $kode_mk)->delete();
        return redirect()->route('krs.index')->with('success', 'Data KRS Dihapus');
    }
}
