<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->nullable()->constrained()->nullOnDelete();
            $table->string('action');
            $table->string('status_from')->nullable();
            $table->string('status_to')->nullable();
            $table->json('response')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index('action');
            $table->index(['payment_id', 'action']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaction_logs');
    }
};
