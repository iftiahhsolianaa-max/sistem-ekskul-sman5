<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Extracurricular extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pembina',
        'schedule',
        'quota',
        'description',
    ];

    // Relasi ke pendaftaran siswa
    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    // TAMBAHKAN RELASI INI UNTUK ABSENSI
    public function attendanceSessions(): HasMany
    {
        return $this->hasMany(AttendanceSession::class);
    }
}