<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BankTransferPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'bank_account_id',
        'reference_number',
        'sender_name',
        'sender_account',
        'sender_bank',
        'attachment',
        'notes',
        'status',
        'confirmed_at',
        'confirmed_by',
    ];

    protected function casts(): array
    {
        return [
            'confirmed_at' => 'datetime',
        ];
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function confirmedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'confirmed_by');
    }

    public function bankTransactions(): HasMany
    {
        return $this->hasMany(BankTransaction::class);
    }
}
