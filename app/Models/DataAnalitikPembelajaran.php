<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnalitikPembelajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',       // Foreign key ke tabel users
        'metrik_kinerja',
        'pola_belajar',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
