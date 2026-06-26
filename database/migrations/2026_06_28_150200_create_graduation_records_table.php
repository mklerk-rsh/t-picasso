<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graduation_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('enrollment_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('certificate_id')->nullable()->constrained()->nullOnDelete();
            $table->date('graduation_date');
            $table->string('class')->nullable();
            $table->string('honors')->nullable();
            $table->decimal('gpa', 4, 2)->nullable();
            $table->text('remarks')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->index('graduation_date');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graduation_records');
    }
};
