<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    protected $table = 'course_subject';

    protected $fillable = [
        'course_id',
        'subject_id',
        'semester',
        'order',
        'credits',
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'credits' => 'integer',
        ];
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function subject(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
