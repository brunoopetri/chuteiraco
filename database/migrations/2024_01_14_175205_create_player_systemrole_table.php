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
        Schema::create('player_systemrole', function (Blueprint $table) {
            $table->id();

            // Foreign keys referencing the 'players' and 'systemrole_user' tables
            $table->foreignId('player_id')->constrained('players');
            $table->foreignId('systemrole_user_id')->constrained('systemrole_user');

            // Unique constraint combining both foreign keys
            $table->unique(['player_id', 'systemrole_user_id']);

            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_systemrole');
    }
};
