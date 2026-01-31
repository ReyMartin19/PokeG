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
    Schema::create('pokemon', function (Blueprint $table) {
        $table->id();
        $table->integer('pokeapi_id')->unique(); // The ID from the official API
        $table->string('name');
        $table->string('sprite_url')->nullable();
        $table->integer('hp');
        $table->integer('attack');
        $table->integer('defense');
        $table->integer('speed');
        $table->string('type_1'); // Primary type (e.g., Fire)
        $table->string('type_2')->nullable(); // Secondary type (e.g., Flying)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
