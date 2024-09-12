<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Support\Facades\Storage;


class User extends Authenticatable implements HasAvatar
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'avatar_url',


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'custom_fields' => 'array',
        ];
    }
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::url("$this->avatar_url") : null;
        // return $this->avatar_url
        //     ? asset('storage/profil/' . $this->image)
        //     : null;
    }
    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
    public function kontenPembelajaran()
    {
        return $this->hasMany(KontenPembelajaran::class);
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'siswa_id');
    }
    // Relasi satu ke banyak (one to many) dengan Interaksi Pengguna
    public function interaksiPengguna()
    {
        return $this->hasMany(InteraksiPengguna::class);
    }
}
