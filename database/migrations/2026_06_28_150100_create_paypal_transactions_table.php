<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paypal_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->nullable()->constrained()->nullOnDelete();
            $table->string('paypal_order_id')->nullable()->unique();
            $table->string('paypal_capture_id')->nullable();
            $table->string('paypal_refund_id')->nullable();
            $table->string('payer_id')->nullable();
            $table->string('payer_email')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->string('currency', 3)->default('USD');
            $table->string('status')->default('pending');
            $table->json('raw_response')->nullable();
            $table->timestamps();

            $table->index('paypal_order_id');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paypal_transactions');
    }
};
