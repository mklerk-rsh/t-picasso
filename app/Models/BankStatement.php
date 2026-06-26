<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BankStatement extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_account_id',
        'file_path',
        'filename',
        'opening_balance',
        'closing_balance',
        'statement_period_start',
        'statement_period_end',
        'total_transactions',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'opening_balance' => 'decimal:2',
            'closing_balance' => 'decimal:2',
            'statement_period_start' => 'date',
            'statement_period_end' => 'date',
            'total_transactions' => 'integer',
        ];
    }

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function bankTransactions(): HasMany
    {
        return $this->hasMany(BankTransaction::class);
    }
}
