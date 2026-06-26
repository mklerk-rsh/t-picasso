<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('attempt_number');
            $table->string('gateway')->nullable();
            $table->json('request')->nullable();
            $table->json('response')->nullable();
            $table->string('status')->default('pending');
            $table->timestamp('attempted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_attempts');
    }
};
