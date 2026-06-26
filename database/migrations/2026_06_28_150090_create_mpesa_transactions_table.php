<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mpesa_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->nullable()->constrained()->nullOnDelete();
            $table->string('merchant_request_id')->nullable()->unique();
            $table->string('checkout_request_id')->nullable()->unique();
            $table->string('conversation_id')->nullable();
            $table->string('originator_conversation_id')->nullable();
            $table->string('response_code')->nullable();
            $table->string('response_description')->nullable();
            $table->string('result_code')->nullable();
            $table->text('result_desc')->nullable();
            $table->string('transaction_id')->nullable()->unique();
            $table->string('phone_number')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->string('receipt_no')->nullable();
            $table->json('raw_response')->nullable();
            $table->json('raw_callback')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->index('checkout_request_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mpesa_transactions');
    }
};
