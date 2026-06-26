<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'payable_type',
        'payable_id',
        'payment_method_id',
        'amount',
        'currency',
        'status',
        'gateway',
        'gateway_transaction_id',
        'transaction_ref',
        'gateway_response',
        'idempotency_key',
        'description',
        'paid_at',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'gateway_response' => 'array',
            'paid_at' => 'datetime',
        ];
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function payable(): MorphTo
    {
        return $this->morphTo();
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function transactionLogs(): HasMany
    {
        return $this->hasMany(TransactionLog::class);
    }

    public function paymentAttempts(): HasMany
    {
        return $this->hasMany(PaymentAttempt::class);
    }

    public function paymentReconciliations(): HasMany
    {
        return $this->hasMany(PaymentReconciliation::class);
    }

    public function mpesaTransaction()
    {
        return $this->hasOne(MpesaTransaction::class);
    }

    public function paypalTransaction()
    {
        return $this->hasOne(PaypalTransaction::class);
    }
}
