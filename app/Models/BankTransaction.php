<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_account_id',
        'bank_statement_id',
        'bank_transfer_payment_id',
        'transaction_date',
        'description',
        'debit',
        'credit',
        'balance',
        'reference',
        'transaction_type',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'transaction_date' => 'date',
            'debit' => 'decimal:2',
            'credit' => 'decimal:2',
            'balance' => 'decimal:2',
        ];
    }

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function bankStatement(): BelongsTo
    {
        return $this->belongsTo(BankStatement::class);
    }

    public function bankTransferPayment(): BelongsTo
    {
        return $this->belongsTo(BankTransferPayment::class);
    }
}
