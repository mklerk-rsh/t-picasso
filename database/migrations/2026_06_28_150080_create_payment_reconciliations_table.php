<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_reconciliations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->nullable()->constrained()->nullOnDelete();
            $table->string('gateway');
            $table->string('transaction_ref')->nullable();
            $table->decimal('amount', 12, 2);
            $table->decimal('gateway_amount', 12, 2)->nullable();
            $table->string('status')->default('pending');
            $table->string('discrepancy')->nullable();
            $table->timestamp('reconciled_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_reconciliations');
    }
};
