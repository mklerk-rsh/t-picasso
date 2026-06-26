<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bank_statements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_account_id')->constrained()->cascadeOnDelete();
            $table->string('file_path');
            $table->string('filename');
            $table->decimal('opening_balance', 12, 2)->nullable();
            $table->decimal('closing_balance', 12, 2)->nullable();
            $table->date('statement_period_start')->nullable();
            $table->date('statement_period_end')->nullable();
            $table->integer('total_transactions')->default(0);
            $table->string('status')->default('uploaded');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_statements');
    }
};
