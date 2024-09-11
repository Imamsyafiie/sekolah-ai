<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasPembelajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_aktivitas',
        'konten_pembelajaran_id',
        'batas_pengumpulan',
        'bobot_penilaian',
    ];
    // Relasi dengan model KontenPembelajaran
    public function kontenPembelajaran()
    {
        return $this->belongsTo(KontenPembelajaran::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
