<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    protected $primaryKey = 'kode_jns_klamin'; // Primary Key bukan ID integer
    public $incrementing = false; // Karena tipe string (P, L)
    protected $keyType = 'string';
    
    // Relasi: Satu Jenis Kelamin punya banyak Mahasiswa
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'kode_jenis_kelamin', 'kode_jns_klamin');
    }
}
