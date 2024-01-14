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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();            
            $table->string('location');
            $table->date('date');            
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status');
            $table->unsignedBigInteger('location_id'); // Foreign key for locations
            $table->timestamps();

            // Foreign key referencing the 'locations' table with ON DELETE CASCADE
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('CASCADE');
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
