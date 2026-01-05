<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('krs', function (Blueprint $table) {
            // Kolom Foreign Keys
            $table->string('m_id', 10); 
            $table->string('kode_mata_kuliah', 10);
            
            $table->integer('sks'); // 24, 18, 15...
            
            $table->timestamps();

            // Membuat Composite Primary Key (Gabungan M# dan Kode MK)
            $table->primary(['m_id', 'kode_mata_kuliah']);

            // Definisi Foreign Keys
            $table->foreign('m_id')
                ->references('m_id')
                ->on('mahasiswas')
                ->onDelete('cascade'); // Jika mahasiswa dihapus, data KRS ikut hilang

            $table->foreign('kode_mata_kuliah')
                ->references('kode_mata_kuliah')
                ->on('mata_kuliahs')
                ->onDelete('cascade'); // Jika MK dihapus, data KRS ikut hilang
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
