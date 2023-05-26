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
        Schema::create('recipe_has_tag', function (Blueprint $table) {
            $table->foreignId('recipe_id')->references('id')->on('recipe')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->references('id')->on('recipe_tag')->constrained()->onDelete('cascade');

            $keys = array('tag_id', 'recipe_id');
            $table->primary($keys);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_has_tag');
    }
};
