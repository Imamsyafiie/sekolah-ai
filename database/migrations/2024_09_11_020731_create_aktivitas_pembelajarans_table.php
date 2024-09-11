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
        Schema::create('aktivitas_pembelajarans', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_aktivitas', ['Kuis', 'Tugas', 'Proyek']); // Jenis Aktivitas
            $table->foreignId('konten_pembelajaran_id')->constrained('konten_pembelajarans')->onDelete('cascade'); // Foreign Key ke Konten Pembelajaran
            $table->date('batas_pengumpulan'); // Batas Pengumpulan
            $table->integer('bobot_penilaian'); // Bobot Penilaian
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas_pembelajarans');
    }
};
