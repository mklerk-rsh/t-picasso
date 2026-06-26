<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'attempt_number',
        'gateway',
        'request',
        'response',
        'status',
        'attempted_at',
    ];

    protected function casts(): array
    {
        return [
            'request' => 'array',
            'response' => 'array',
            'attempted_at' => 'datetime',
        ];
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
