<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_registration_id',
        'student_id',
        'submitted_at',
        'status',
        'total_marks',
        'percentage',
    ];

    protected function casts(): array
    {
        return [
            'submitted_at' => 'datetime',
            'total_marks' => 'decimal:2',
            'percentage' => 'decimal:2',
        ];
    }

    public function examRegistration(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ExamRegistration::class, 'exam_registration_id');
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function answers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamAnswer::class, 'exam_submission_id');
    }

    public function result(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ExamResult::class, 'exam_submission_id');
    }
}
