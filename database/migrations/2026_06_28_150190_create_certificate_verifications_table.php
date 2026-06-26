<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificate_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_id')->constrained()->cascadeOnDelete();
            $table->string('verification_status');
            $table->string('verifier_name')->nullable();
            $table->string('verifier_email')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->json('verification_metadata')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificate_verifications');
    }
};
