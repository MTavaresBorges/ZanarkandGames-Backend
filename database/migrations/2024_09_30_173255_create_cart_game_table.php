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
        Schema::create('cart_game', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cart_id')->unsigned();
            $table->bigInteger('game_id')->unsigned();
            $table->integer('amount');
            $table->timestamps();
        });

        Schema::table('cart_game', function (Blueprint $table) {
            $table->foreign('cart_id')->references('id')->on('carts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('game_id')->references('id')->on('games')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_game');
    }
};
