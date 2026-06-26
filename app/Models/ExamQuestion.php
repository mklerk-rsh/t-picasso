<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'question_text',
        'type',
        'options',
        'correct_answer',
        'marks',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'options' => 'json',
            'marks' => 'decimal:2',
            'order' => 'integer',
        ];
    }

    public function exam(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function answers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExamAnswer::class, 'exam_question_id');
    }
}
