<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Registration extends Model
{
    protected $fillable = [
        'user_id',
        'extracurricular_id',
        'status',
    ];

    /**
     * Relasi ke user/siswa.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class
        );
    }

    /**
     * Relasi ke ekstrakurikuler.
     */
    public function extracurricular(): BelongsTo
    {
        return $this->belongsTo(
            Extracurricular::class
        );
    }

    /**
     * Relasi ke riwayat perubahan status.
     */
    public function logs(): HasMany
    {
        return $this->hasMany(
            RegistrationLog::class
        )->latest();
    }
}