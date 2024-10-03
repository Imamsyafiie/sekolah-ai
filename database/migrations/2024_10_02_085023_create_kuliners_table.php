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
        Schema::create('kuliners', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // Untuk menyimpan URL gambar
            $table->string('title');
            $table->string('alamat');
            $table->decimal('price', 10, 2); // Untuk harga
            $table->text('text'); // Deskripsi kuliner
            $table->date('published_at')->nullable(); // Tanggal publikasi
            $table->string('nomor_hp'); // Nomor HP pemilik atau kontak
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Relasi ke tabel categories
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuliners');
    }
};
