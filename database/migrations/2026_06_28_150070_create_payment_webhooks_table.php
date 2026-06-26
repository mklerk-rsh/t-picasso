<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_webhooks', function (Blueprint $table) {
            $table->id();
            $table->string('gateway');
            $table->json('payload');
            $table->json('headers')->nullable();
            $table->string('status')->default('received');
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_webhooks');
    }
};
