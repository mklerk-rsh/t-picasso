<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentReconciliation extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'gateway',
        'transaction_ref',
        'amount',
        'gateway_amount',
        'status',
        'discrepancy',
        'reconciled_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'gateway_amount' => 'decimal:2',
            'reconciled_at' => 'datetime',
        ];
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
