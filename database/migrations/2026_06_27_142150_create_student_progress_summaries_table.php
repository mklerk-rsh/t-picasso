<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_progress_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('total_topics')->default(0);
            $table->unsignedSmallInteger('completed_topics')->default(0);
            $table->decimal('progress_percentage', 5, 2)->default(0);
            $table->decimal('average_score', 5, 2)->nullable();
            $table->unsignedInteger('total_time_spent_minutes')->default(0);
            $table->timestamp('last_activity_at')->nullable();
            $table->timestamps();

            $table->unique(['student_id', 'course_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_progress_summaries');
    }
};
