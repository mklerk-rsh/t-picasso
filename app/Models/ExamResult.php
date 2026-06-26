<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_submission_id',
        'marks',
        'percentage',
        'grade',
        'remarks',
        'passed',
    ];

    protected function casts(): array
    {
        return [
            'marks' => 'decimal:2',
            'percentage' => 'decimal:2',
            'passed' => 'boolean',
        ];
    }

    public function examSubmission(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ExamSubmission::class, 'exam_submission_id');
    }
}
