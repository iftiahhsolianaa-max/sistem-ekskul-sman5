<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RegistrationPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_at',
        'end_at',
        'is_active',
        'description',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Mengecek apakah periode sedang aktif.
     */
    public function isOpen(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        $now = Carbon::now();

        return $now->greaterThanOrEqualTo($this->start_at)
            && $now->lessThanOrEqualTo($this->end_at);
    }

    /**
     * Status periode.
     */
    public function getStatusAttribute(): string
    {
        if (!$this->is_active) {
            return 'Nonaktif';
        }

        $now = Carbon::now();

        if ($now->lt($this->start_at)) {
            return 'Belum Dibuka';
        }

        if ($now->gt($this->end_at)) {
            return 'Sudah Ditutup';
        }

        return 'Sedang Dibuka';
    }
}