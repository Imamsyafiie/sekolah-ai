<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $fillable = ['siswa_id', 'nilai', 'feedback', 'file_tugas', 'text', 'tema', 'judul', 'deskripsi'];

    // public function aktivitasPembelajaran()
    // {
    //     return $this->belongsTo(AktivitasPembelajaran::class);
    // }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
