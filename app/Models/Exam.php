<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'title',
        'type',
        'progress_required',
        'duration_minutes',
        'total_marks',
        'pass_mark',
        'fee',
        'status',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'progress_required' => 'integer',
            'duration_minutes' => 'integer',
            'total_marks' => 'decimal:2',
            'pass_mark' => 'decimal:2',
            'fee' => 'decimal:2',
            'published_at' => 'datetime',
        ];
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function questions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function registrations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamRegistration::class);
    }

    public function scorecards(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamScorecard::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
