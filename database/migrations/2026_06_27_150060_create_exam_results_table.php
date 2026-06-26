<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_submission_id')->unique()->constrained()->cascadeOnDelete();
            $table->decimal('marks', 8, 2);
            $table->decimal('percentage', 5, 2);
            $table->string('grade');
            $table->text('remarks')->nullable();
            $table->boolean('passed')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_results');
    }
};
