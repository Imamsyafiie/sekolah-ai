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
        Schema::create('konten_pembelajarans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->enum('jenis_konten', ['PDF', 'Gambar', 'Video']); // Jenis konten
            $table->string('mata_pelajaran');
            $table->string('tingkat_kelas');
            $table->string('file_path'); // Menyimpan path file
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign Key ke tabel users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten_pembelajarans');
    }
};
