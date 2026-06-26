<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScorecard extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'exam_id',
        'enrollment_id',
        'marks',
        'grade',
        'generated_at',
    ];

    protected function casts(): array
    {
        return [
            'marks' => 'decimal:2',
            'generated_at' => 'datetime',
        ];
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function exam(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function enrollment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
}
