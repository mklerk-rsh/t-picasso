<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->morphs('payable');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->decimal('amount', 12, 2);
            $table->string('currency', 3)->default('USD');
            $table->string('status')->default('pending');
            $table->string('gateway')->nullable();
            $table->string('gateway_transaction_id')->nullable();
            $table->string('transaction_ref')->nullable();
            $table->json('gateway_response')->nullable();
            $table->string('idempotency_key')->nullable()->unique();
            $table->text('description')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
            $table->index('transaction_ref');
            $table->index('gateway_transaction_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
