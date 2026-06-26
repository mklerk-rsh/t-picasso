<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_application_id',
        'from_status',
        'to_status',
        'changed_by',
        'remarks',
    ];

    public function courseApplication(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CourseApplication::class);
    }

    public function changedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
