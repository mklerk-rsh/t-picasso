<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_registration_id',
        'payment_id',
        'amount',
        'status',
        'paid_at',
        'payment_method',
        'transaction_ref',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'paid_at' => 'datetime',
        ];
    }

    public function examRegistration(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ExamRegistration::class, 'exam_registration_id');
    }

    public function payment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
