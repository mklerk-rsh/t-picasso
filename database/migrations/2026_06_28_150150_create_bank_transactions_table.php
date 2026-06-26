<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_account_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bank_statement_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('bank_transfer_payment_id')->nullable()->constrained()->nullOnDelete();
            $table->date('transaction_date');
            $table->string('description')->nullable();
            $table->decimal('debit', 12, 2)->default(0);
            $table->decimal('credit', 12, 2)->default(0);
            $table->decimal('balance', 12, 2)->nullable();
            $table->string('reference')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('status')->default('unmatched');
            $table->timestamps();

            $table->index('transaction_date');
            $table->index('reference');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_transactions');
    }
};
