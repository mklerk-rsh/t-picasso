<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateTemplate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'layout_config',
        'description',
        'background_image',
        'font_family',
        'placeholders',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'layout_config' => 'array',
            'placeholders' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }
}
