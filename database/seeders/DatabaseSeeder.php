<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Isi Jenis Kelamin
        DB::table('jenis_kelamins')->insert([
            ['kode_jns_klamin' => 'P', 'description' => 'Perempuan'],
            ['kode_jns_klamin' => 'L', 'description' => 'Laki-Laki'],
        ]);

        // 2. Isi Mata Kuliah
        DB::table('mata_kuliahs')->insert([
            ['kode_mata_kuliah' => 'W1', 'nama_mata_kuliah' => 'Sistem Basis Data', 'dosen' => 'Trihono', 'jurusan' => 'TI'],
            ['kode_mata_kuliah' => 'W2', 'nama_mata_kuliah' => 'Struktur Data', 'dosen' => 'Ida', 'jurusan' => 'AK'],
            ['kode_mata_kuliah' => 'W3', 'nama_mata_kuliah' => 'Bahasa Pemrograman', 'dosen' => 'Hernadi', 'jurusan' => 'TI'],
            ['kode_mata_kuliah' => 'W4', 'nama_mata_kuliah' => 'Kalkulus', 'dosen' => 'Chandra', 'jurusan' => 'AK'],
        ]);

        // 3. Isi Mahasiswa
        DB::table('mahasiswas')->insert([
            ['m_id' => 'M1',  'nim' => '2007.000075', 'kode_jenis_kelamin' => 'P', 'nama_mahasiswa' => 'Yanny',    'jurusan' => 'AK', 'ipk' => 3.75],
            ['m_id' => 'M2',  'nim' => '2007.000086', 'kode_jenis_kelamin' => 'L', 'nama_mahasiswa' => 'Andi',     'jurusan' => 'TI', 'ipk' => 2.01],
            ['m_id' => 'M3',  'nim' => '2007.000090', 'kode_jenis_kelamin' => 'P', 'nama_mahasiswa' => 'Stella',   'jurusan' => 'TI', 'ipk' => 2.60],
            ['m_id' => 'M4',  'nim' => '2007.000093', 'kode_jenis_kelamin' => 'L', 'nama_mahasiswa' => 'Budi',     'jurusan' => 'AK', 'ipk' => 2.56],
            ['m_id' => 'M5',  'nim' => '2007.000201', 'kode_jenis_kelamin' => 'L', 'nama_mahasiswa' => 'Risanto',  'jurusan' => 'AK', 'ipk' => 3.16],
            ['m_id' => 'M6',  'nim' => '2007.000210', 'kode_jenis_kelamin' => 'P', 'nama_mahasiswa' => 'Andriani', 'jurusan' => 'AK', 'ipk' => 3.56],
            ['m_id' => 'M7',  'nim' => '2007.000246', 'kode_jenis_kelamin' => 'L', 'nama_mahasiswa' => 'Dimas',    'jurusan' => 'TI', 'ipk' => 2.75],
            ['m_id' => 'M8',  'nim' => '2007.000259', 'kode_jenis_kelamin' => 'L', 'nama_mahasiswa' => 'Johan',    'jurusan' => 'TI', 'ipk' => 1.85],
            ['m_id' => 'M9',  'nim' => '2007.000270', 'kode_jenis_kelamin' => 'P', 'nama_mahasiswa' => 'Cristine', 'jurusan' => 'TI', 'ipk' => 2.27],
            ['m_id' => 'M10', 'nim' => '2007.000295', 'kode_jenis_kelamin' => 'P', 'nama_mahasiswa' => 'Melan',    'jurusan' => 'TI', 'ipk' => 2.43],
        ]);

        // 4. Isi KRS
        DB::table('krs')->insert([
            ['m_id' => 'M1', 'kode_mata_kuliah' => 'W1', 'sks' => 24],
            ['m_id' => 'M2', 'kode_mata_kuliah' => 'W1', 'sks' => 24],
            ['m_id' => 'M3', 'kode_mata_kuliah' => 'W4', 'sks' => 18],
            ['m_id' => 'M4', 'kode_mata_kuliah' => 'W2', 'sks' => 15],
            ['m_id' => 'M5', 'kode_mata_kuliah' => 'W3', 'sks' => 12],
            ['m_id' => 'M6', 'kode_mata_kuliah' => 'W3', 'sks' => 12],
            ['m_id' => 'M7', 'kode_mata_kuliah' => 'W4', 'sks' => 15],
        ]);
    }
}
