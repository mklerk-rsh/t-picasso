<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MpesaTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'merchant_request_id',
        'checkout_request_id',
        'conversation_id',
        'originator_conversation_id',
        'response_code',
        'response_description',
        'result_code',
        'result_desc',
        'transaction_id',
        'phone_number',
        'amount',
        'receipt_no',
        'raw_response',
        'raw_callback',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'raw_response' => 'array',
            'raw_callback' => 'array',
        ];
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
