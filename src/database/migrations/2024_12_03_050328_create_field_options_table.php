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
        Schema::create('field_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_field_id')->constrained('form_fields')->cascadeOnDelete();
            $table->string('name');
            $table->string('value');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['form_field_id', 'value']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_options');
    }
};
