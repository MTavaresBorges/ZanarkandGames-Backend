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
        Schema::create('game_genre', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('game_id')->unsigned();
            $table->bigInteger('genre_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('game_genre', function (Blueprint $table) {
            $table->foreign('game_id')->references('id')->on('games')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_genre');
    }
};
