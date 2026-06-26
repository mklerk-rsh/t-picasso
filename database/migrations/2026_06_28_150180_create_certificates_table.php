<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('enrollment_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('certificate_template_id')->nullable()->constrained()->nullOnDelete();
            $table->string('certificate_number')->nullable()->unique();
            $table->string('type');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->string('status')->default('draft');
            $table->timestamp('issued_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('certificate_number');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
