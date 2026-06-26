<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CertificateVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_id',
        'verification_status',
        'verifier_name',
        'verifier_email',
        'ip_address',
        'verification_metadata',
        'verified_at',
    ];

    protected function casts(): array
    {
        return [
            'verification_metadata' => 'array',
            'verified_at' => 'datetime',
        ];
    }

    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }
}
