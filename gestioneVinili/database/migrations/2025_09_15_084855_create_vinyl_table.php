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
        Schema::create('vinyl', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('release_year')->nullable();
            $table->text('cover_image')->nullable();
            $table->foreignId('artist_id')->nullable()->constrained('artist')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vinyl');
    }
};
