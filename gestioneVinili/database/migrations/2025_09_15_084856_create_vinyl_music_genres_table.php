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
        Schema::create('vinyl_music_genres', function (Blueprint $table) {
            $table->foreignId('vinyl_id')->constrained('vinyl')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('genre_id')->constrained('music_genre')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->primary(['vinyl_id', 'genre_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vinyl_music_genres');
    }
};
