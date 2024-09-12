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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aktivitas_pembelajaran_id')->constrained('aktivitas_pembelajarans')->onDelete('cascade');
            $table->foreignId('siswa_id')->constrained('users')->onDelete('cascade'); // Anggap 'users' adalah tabel siswa
            $table->integer('nilai')->nullable();
            $table->text('feedback')->nullable();
            $table->string('file_tugas')->nullable(); // Untuk menyimpan path file tugas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
