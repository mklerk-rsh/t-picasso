<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankReconciliation extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'bank_transfer_payment_id',
        'bank_transaction_id',
        'match_type',
        'amount',
        'matched_amount',
        'difference',
        'status',
        'reconciled_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'matched_amount' => 'decimal:2',
            'difference' => 'decimal:2',
            'reconciled_at' => 'datetime',
        ];
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function bankTransferPayment(): BelongsTo
    {
        return $this->belongsTo(BankTransferPayment::class);
    }

    public function bankTransaction(): BelongsTo
    {
        return $this->belongsTo(BankTransaction::class);
    }
}
