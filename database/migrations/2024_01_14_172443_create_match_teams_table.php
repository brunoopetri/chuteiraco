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
        Schema::create('match_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id'); 
            $table->unsignedBigInteger('team_id');            
            $table->timestamps();

            // Foreign key referencing the 'matches' table with ON DELETE CASCADE
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
            
            // Foreign key referencing the 'teams' table with ON DELETE CASCADE 
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_teams');
    }
};
