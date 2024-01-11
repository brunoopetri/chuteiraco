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
        Schema::create('phoneusers', function (Blueprint $table) {
            $table->id();
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->unsignedBigInteger('users_id'); // Add foreign key for users            
            $table->timestamps();

            // Foreign key referencing the 'users' table with ON DELETE CASCADE
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phoneusers');
    }
};
