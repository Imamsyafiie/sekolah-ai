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
        Schema::create('interaksi_pengguna', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('aktivitas_pembelajaran_id')->nullable()->constrained()->onDelete('cascade'); // Foreign key ke aktivitas pembelajaran
            $table->enum('jenis_interaksi', ['Melihat', 'Mengunduh', 'Menyelesaikan', 'Lainnya']); // Jenis interaksi
            $table->timestamp('waktu_interaksi')->useCurrent(); // Waktu interaksi
            $table->string('data_tambahan')->nullable(); // Data tambahan, seperti jawaban kuis atau durasi menonton video
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interaksi_pengguna');
    }
};
