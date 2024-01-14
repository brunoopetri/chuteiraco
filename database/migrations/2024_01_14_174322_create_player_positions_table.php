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
        Schema::create('player_positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id'); 
            $table->unsignedBigInteger('position_id');
            $table->timestamps();

            // Foreign key referencing the 'players' table with ON DELETE CASCADE
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade'); 
            
            // Foreign key referencing the 'positions' table with ON DELETE CASCADE
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_positions');
    }
};
