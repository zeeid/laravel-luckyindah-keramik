<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        // Mengambil semua data mahasiswa beserta relasi jenis kelaminnya
        $mahasiswa = Mahasiswa::with('jenisKelamin')->get();
        
        // Mengambil data KRS untuk ditampilkan juga (bonus, karena Anda minta lengkap)
        $dataKrs = Krs::with(['mahasiswa', 'mataKuliah'])->get();

        return view('laporan.index', compact('mahasiswa', 'dataKrs'));
    }

    // Fitur Export Excel (Sederhana dengan Headers PHP)
    public function exportExcel()
    {
        $filename = "laporan_mahasiswa_" . date('YmdHis') . ".xls";
        
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        
        $mahasiswa = Mahasiswa::with('jenisKelamin')->get();
        return view('laporan.excel', compact('mahasiswa'));
    }
}
