<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_registration_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->timestamp('submitted_at')->nullable();
            $table->string('status')->default('in_progress');
            $table->decimal('total_marks', 8, 2)->nullable();
            $table->decimal('percentage', 5, 2)->nullable();
            $table->timestamps();

            $table->unique('exam_registration_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_submissions');
    }
};
