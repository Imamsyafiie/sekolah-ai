<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'mata_pembelajaran'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
