<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_submission_id',
        'exam_question_id',
        'answer_text',
        'marks_awarded',
    ];

    protected function casts(): array
    {
        return [
            'marks_awarded' => 'decimal:2',
        ];
    }

    public function examSubmission(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ExamSubmission::class, 'exam_submission_id');
    }

    public function examQuestion(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ExamQuestion::class, 'exam_question_id');
    }
}
