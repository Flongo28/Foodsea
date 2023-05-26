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
        Schema::create('needs_ingredient', function (Blueprint $table) {
            $table->foreignId('ingredient_id')->references('id')->on('ingredient')->constrained()->onDelete('cascade');
            $table->foreignId('recipe_id')->references('id')->on('recipe')->constrained()->onDelete('cascade');

            $keys = array('ingredient_id', 'recipe_id');
            $table->primary($keys);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('needs_ingredient');
    }
};
