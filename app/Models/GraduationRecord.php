<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GraduationRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'enrollment_id',
        'certificate_id',
        'graduation_date',
        'class',
        'honors',
        'gpa',
        'remarks',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'graduation_date' => 'date',
            'gpa' => 'decimal:2',
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

    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }
}
