<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaypalTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'paypal_order_id',
        'paypal_capture_id',
        'paypal_refund_id',
        'payer_id',
        'payer_email',
        'amount',
        'currency',
        'status',
        'raw_response',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'raw_response' => 'array',
        ];
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
