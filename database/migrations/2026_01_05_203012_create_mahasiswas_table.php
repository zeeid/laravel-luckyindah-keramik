<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            // Primary Key: M# (Kita gunakan 'm_id' agar standar SQL)
            $table->string('m_id', 10)->primary(); 
            $table->string('nim', 20);
            $table->string('kode_jenis_kelamin', 5); // Foreign Key
            $table->string('nama_mahasiswa');
            $table->string('jurusan', 10);
            $table->decimal('ipk', 3, 2);
            $table->timestamps();

            // Relasi
            $table->foreign('kode_jenis_kelamin')
                ->references('kode_jns_klamin')
                ->on('jenis_kelamins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
