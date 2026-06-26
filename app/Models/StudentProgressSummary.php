<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProgressSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'total_topics',
        'completed_topics',
        'progress_percentage',
        'average_score',
        'total_time_spent_minutes',
        'last_activity_at',
    ];

    protected function casts(): array
    {
        return [
            'progress_percentage' => 'decimal:2',
            'average_score' => 'decimal:2',
            'total_time_spent_minutes' => 'integer',
            'last_activity_at' => 'datetime',
        ];
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
