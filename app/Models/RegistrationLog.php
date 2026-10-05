<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrationLog extends Model
{
    protected $fillable = [
        'registration_id',
        'admin_id',
        'old_status',
        'new_status',
    ];

    public function registration(): BelongsTo
    {
        return $this->belongsTo(
            Registration::class
        );
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'admin_id'
        );
    }
}