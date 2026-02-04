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
     Schema::create('user_progress', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->foreignId('story_id')->constrained()->onDelete('cascade');
      $table->boolean('is_read')->default(false);
      $table->timestamp('read_at')->nullable();
      $table->integer('pic_a_word_score')->nullable();
      $table->integer('decode_word_score')->nullable();
      $table->integer('stars')->default(0); // 0-3
      $table->timestamps();
  });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_progress');
    }
};
