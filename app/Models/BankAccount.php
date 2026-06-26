<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'bank_name',
        'account_name',
        'account_number',
        'branch',
        'swift_code',
        'iban',
        'routing_number',
        'currency',
        'type',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function bankStatements(): HasMany
    {
        return $this->hasMany(BankStatement::class);
    }

    public function bankTransactions(): HasMany
    {
        return $this->hasMany(BankTransaction::class);
    }

    public function bankTransferPayments(): HasMany
    {
        return $this->hasMany(BankTransferPayment::class);
    }
}
