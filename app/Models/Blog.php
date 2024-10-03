<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'publish_date', 'nilai_id'];

    // Definisi relasi ke model Nilai
    public function nilai()
    {
        return $this->belongsTo(Nilai::class);
    }
}
