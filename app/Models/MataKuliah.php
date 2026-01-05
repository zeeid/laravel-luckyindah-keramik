<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $primaryKey = 'kode_mata_kuliah';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'dosen',
        'jurusan'
    ];

    // Relasi: Satu MK bisa diambil banyak Mahasiswa (Lewat tabel KRS)
    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'krs', 'kode_mata_kuliah', 'm_id')
                    ->withPivot('sks');
    }
}
