<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bank_reconciliations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bank_transfer_payment_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('bank_transaction_id')->nullable()->constrained()->nullOnDelete();
            $table->string('match_type');
            $table->decimal('amount', 12, 2);
            $table->decimal('matched_amount', 12, 2)->nullable();
            $table->decimal('difference', 12, 2)->default(0);
            $table->string('status')->default('pending');
            $table->timestamp('reconciled_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_reconciliations');
    }
};
