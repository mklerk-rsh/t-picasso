<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertificatePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'certificate_id',
    ];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }
}
