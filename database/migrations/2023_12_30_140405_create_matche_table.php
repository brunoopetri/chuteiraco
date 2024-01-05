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
        Schema::create('matche', function (Blueprint $table) {
            $table->id();
            $table->string('active');            
            $table->date('date');
            $table->string('location');
            $table->unsignedBigInteger('team_id')->nullable(); // Foreign key
            $table->unsignedInteger('minimum_players');            
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            // Foreign key referencing the 'teams' table with ON DELETE CASCADE
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matche');
    }
};
