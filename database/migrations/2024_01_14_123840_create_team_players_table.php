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
        Schema::create('team_players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id'); // Add foreign key for players
            $table->unsignedBigInteger('team_id'); // Add foreign key for teams
            $table->timestamps();

            // Foreign key referencing the 'players' table with ON DELETE CASCADE
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            // Foreign key referencing the 'teams' table with ON DELETE CASCADE
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_players');
    }
};
