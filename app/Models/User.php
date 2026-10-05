<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Field yang boleh diisi menggunakan mass assignment.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nis',
        'kelas',
        'jurusan',
    ];

    /**
     * Field yang disembunyikan.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting data.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Cek apakah user adalah admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }


    /**
     * Cek apakah user adalah siswa.
     */
    public function isSiswa(): bool
    {
        return $this->role === 'siswa';
    }


    /**
     * Relasi ke pendaftaran ekstrakurikuler.
     */
    public function registrations()
    {
        return $this->hasMany(
            Registration::class
        );
    }
}