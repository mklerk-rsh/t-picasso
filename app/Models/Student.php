<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'student_number',
        'admission_date',
        'status',
        'profile_photo',
    ];

    protected function casts(): array
    {
        return [
            'admission_date' => 'date',
        ];
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function enrollments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function courses(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments')
            ->withPivot(['status', 'enrolled_at', 'progress_percentage'])
            ->withTimestamps();
    }

    public function courseApplications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CourseApplication::class);
    }

    public function studentCourses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StudentCourse::class);
    }

    public function progressSummary(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StudentProgressSummary::class);
    }

    public function examRegistrations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamRegistration::class);
    }

    public function examSubmissions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamSubmission::class);
    }

    public function examScorecards(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamScorecard::class);
    }

    public function topicProgress(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TopicProgress::class);
    }

    public function attendance(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getNameAttribute(): string
    {
        return $this->user?->name ?? '';
    }

    public function getEmailAttribute(): string
    {
        return $this->user?->email ?? '';
    }
}
