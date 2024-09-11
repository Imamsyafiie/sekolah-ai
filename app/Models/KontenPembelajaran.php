<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenPembelajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'jenis_konten',
        'mata_pelajaran',
        'tingkat_kelas',
        'file_path', // Menyimpan path file
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Relasi dengan model AktivitasPembelajaran
    public function aktivitasPembelajarans()
    {
        return $this->hasMany(AktivitasPembelajaran::class);
    }
}
