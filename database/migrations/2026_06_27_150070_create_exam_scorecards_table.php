<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_scorecards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('exam_id')->constrained()->cascadeOnDelete();
            $table->foreignId('enrollment_id')->nullable()->constrained()->nullOnDelete();
            $table->decimal('marks', 8, 2);
            $table->string('grade');
            $table->timestamp('generated_at')->useCurrent();
            $table->timestamps();

            $table->unique(['student_id', 'exam_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_scorecards');
    }
};
