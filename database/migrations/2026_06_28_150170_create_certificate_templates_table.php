<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificate_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->json('layout_config')->nullable();
            $table->text('description')->nullable();
            $table->string('background_image')->nullable();
            $table->string('font_family')->nullable();
            $table->json('placeholders')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificate_templates');
    }
};
