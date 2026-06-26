<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'enrollment_id',
        'certificate_template_id',
        'certificate_number',
        'type',
        'title',
        'description',
        'file_path',
        'status',
        'issued_at',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            'issued_at' => 'datetime',
            'expires_at' => 'datetime',
        ];
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(CertificateTemplate::class, 'certificate_template_id');
    }

    public function verifications(): HasMany
    {
        return $this->hasMany(CertificateVerification::class);
    }

    public function graduationRecord()
    {
        return $this->hasOne(GraduationRecord::class);
    }

    public function certificatePayment()
    {
        return $this->hasOne(CertificatePayment::class);
    }
}
