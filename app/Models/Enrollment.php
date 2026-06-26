<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'course_id',
        'course_application_id',
        'enrolled_at',
        'status',
        'progress_percentage',
    ];

    protected function casts(): array
    {
        return [
            'enrolled_at' => 'datetime',
            'progress_percentage' => 'integer',
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

    public function courseApplication(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CourseApplication::class);
    }

    public function tracking(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(EnrollmentTracking::class);
    }

    public function studentCourse(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(StudentCourse::class);
    }
}
