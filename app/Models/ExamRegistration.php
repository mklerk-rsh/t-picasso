<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'student_id',
        'enrollment_id',
        'status',
        'registered_at',
        'approved_at',
    ];

    protected function casts(): array
    {
        return [
            'registered_at' => 'datetime',
            'approved_at' => 'datetime',
        ];
    }

    public function exam(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function enrollment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function payment(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ExamPayment::class, 'exam_registration_id');
    }

    public function submission(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ExamSubmission::class, 'exam_registration_id');
    }
}
