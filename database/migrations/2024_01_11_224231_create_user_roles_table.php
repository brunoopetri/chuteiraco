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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add foreign key for users
            $table->unsignedBigInteger('system_role_id'); // Add foreign key for system_roles
            $table->timestamps();

            // Foreign key referencing the 'users' table with ON DELETE CASCADE
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Foreign key referencing the 'system_roles' table with ON DELETE CASCADE
            $table->foreign('system_role_id')->references('id')->on('system_roles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
