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
        Schema::create('group_position', function (Blueprint $table) {
            $table->id();
            
            // Foreign key for players
            $table->foreignId('group_id')->constrained('groups');
            
            // Foreign key for positions
            $table->foreignId('position_id')->constrained('positions');
            
            // Unique constraint combining both foreign keys
            $table->unique(['group_id', 'position_id']);

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
        Schema::dropIfExists('player_positions');
    }
};
