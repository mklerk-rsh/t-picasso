<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'from_status',
        'to_status',
        'changed_by',
        'reason',
    ];

    public function enrollment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function changedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
