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
        Schema::create('match_player_positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id'); 
            $table->unsignedBigInteger('player_id'); 
            $table->unsignedBigInteger('position_id'); 
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade'); 
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade'); 
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_player_positions');
    }
};
