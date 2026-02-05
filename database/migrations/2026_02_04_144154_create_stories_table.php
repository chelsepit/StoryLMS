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
       Schema::create('stories', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('author')->nullable();
      $table->enum('category', ['FOLKTALES', 'FABLES', 'MYTH', 'SHORT_STORY', 'LEGEND']);
      $table->text('content'); // Full story text
      $table->boolean('is_active')->default(false);
      $table->timestamps();
  });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
