<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaypalWebhook extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_type',
        'resource_type',
        'resource_id',
        'summary',
        'payload',
        'status',
        'processed_at',
    ];

    protected function casts(): array
    {
        return [
            'payload' => 'array',
            'processed_at' => 'datetime',
        ];
    }
}
