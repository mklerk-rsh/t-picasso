<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('branch')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('iban')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('currency', 3)->default('KES');
            $table->string('type')->default('savings');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
