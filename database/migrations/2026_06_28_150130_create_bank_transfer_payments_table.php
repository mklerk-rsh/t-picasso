<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bank_transfer_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bank_account_id')->nullable()->constrained()->nullOnDelete();
            $table->string('reference_number')->nullable()->unique();
            $table->string('sender_name')->nullable();
            $table->string('sender_account')->nullable();
            $table->string('sender_bank')->nullable();
            $table->string('attachment')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('pending');
            $table->timestamp('confirmed_at')->nullable();
            $table->foreignId('confirmed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index('reference_number');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_transfer_payments');
    }
};
