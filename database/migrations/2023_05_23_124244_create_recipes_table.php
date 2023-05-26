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
        Schema::create('recipe', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title');
            $table->string('subtitle');
            $table->decimal('rating', 4, 2)->nullable();
            $table->integer('numVotes')->nullable();
            $table->integer('difficulty');
            $table->integer('viewCount');
            $table->integer('cookingTime');
            $table->integer('restingTime');
            $table->integer('totalTime');
            $table->string('previewImageUrlTemplate');
            $table->string('siteUrl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe');
    }
};
