<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'status',
        'applied_at',
        'reviewed_at',
        'reviewed_by',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'applied_at' => 'datetime',
            'reviewed_at' => 'datetime',
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

    public function reviewedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function admissionStatuses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AdmissionStatus::class, 'course_application_id');
    }

    public function enrollment(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Enrollment::class, 'course_application_id');
    }
}
