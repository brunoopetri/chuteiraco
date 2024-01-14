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
        Schema::create('player_team_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id'); 
            $table->string('confirmation_status'); 
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_team_status');
    }
};
