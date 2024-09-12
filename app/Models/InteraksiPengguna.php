<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteraksiPengguna extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nilai_id',
        'aktivitas_pembelajaran_id',
        'jenis_interaksi',
        'waktu_interaksi',
        'data_tambahan',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function nilai()
    // {
    //     return $this->belongsTo(Nilai::class);
    // }

    /**
     * Relasi ke model AktivitasPembelajaran
     */
    public function aktivitasPembelajaran()
    {
        return $this->belongsTo(AktivitasPembelajaran::class);
    }
}
