<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paypal_webhooks', function (Blueprint $table) {
            $table->id();
            $table->string('event_type');
            $table->string('resource_type')->nullable();
            $table->string('resource_id')->nullable();
            $table->string('summary')->nullable();
            $table->json('payload');
            $table->string('status')->default('received');
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();

            $table->index('event_type');
            $table->index('resource_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paypal_webhooks');
    }
};
