<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $primaryKey = 'm_id'; // M1, M2...
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['m_id', 'nim', 'kode_jenis_kelamin', 'nama_mahasiswa', 'jurusan', 'ipk'];

    // Relasi ke Jenis Kelamin (Inverse)
    public function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'kode_jenis_kelamin', 'kode_jns_klamin');
    }

    // Relasi: Mahasiswa mengambil banyak Mata Kuliah (Lewat tabel KRS)
    public function mataKuliahs()
    {
        return $this->belongsToMany(MataKuliah::class, 'krs', 'm_id', 'kode_mata_kuliah')
                    ->withPivot('sks');
    }
}
