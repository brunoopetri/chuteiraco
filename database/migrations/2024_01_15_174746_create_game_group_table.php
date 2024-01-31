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
        Schema::create('game_player', function (Blueprint $table) {
            $table->id();
            
            // Foreign key for games
            $table->foreignId('game_team_id')->constrained('game_team');
            
            // Foreign key for player_role_users
            $table->foreignId('group_id')->constrained('groups');
            
            // Unique constraint combining both foreign keys
            $table->unique(['game_team_id', 'group_id']);

            // Timestamps for created_at and updated_at
            $table->timestamps();

            // Soft Deletes
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_player');
    }
};
