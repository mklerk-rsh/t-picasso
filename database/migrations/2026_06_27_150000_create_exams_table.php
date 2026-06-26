<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('type');
            $table->unsignedTinyInteger('progress_required')->default(0);
            $table->unsignedSmallInteger('duration_minutes')->default(60);
            $table->decimal('total_marks', 6, 2)->default(100);
            $table->decimal('pass_mark', 6, 2)->default(50);
            $table->decimal('fee', 10, 2)->default(0);
            $table->string('status')->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
