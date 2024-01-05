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
        Schema::create('group', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('system_role_id')->nullable(); // Add foreign key
            $table->timestamps();
            
            // Foreign key referencing the 'teams' table with ON DELETE CASCADE
            $table->foreign('system_role_id')->references('id')->on('system_roles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group');
    }
};
