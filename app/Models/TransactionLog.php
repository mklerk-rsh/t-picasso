<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'action',
        'status_from',
        'status_to',
        'response',
        'ip_address',
        'user_agent',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'response' => 'array',
        ];
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
