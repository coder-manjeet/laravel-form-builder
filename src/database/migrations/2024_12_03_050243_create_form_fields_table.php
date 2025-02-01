<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id();

            $table->foreignId('form_id')->constrained('forms')->cascadeOnDelete();
            $table->unsignedBigInteger('parent_id')->nullable();
            
            $table->string('name')->unique();
            $table->string('type')->nullable();
            $table->string('label')->nullable();
            $table->longText('description')->nullable();
            $table->json('settings')->nullable();
            $table->boolean('required')->default(false);
            $table->string('placeholder')->nullable();
            $table->string('default_value')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('form_fields')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_fields');
    }
};
