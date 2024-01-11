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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('system_role_id')->nullable(); // Add foreign key for system_roles
            $table->unsignedBigInteger('group_role_id')->nullable(); // Add foreign key for group_roles
            $table->timestamps();
            
            // Foreign key referencing the 'system_roles' table with ON DELETE CASCADE
            $table->foreign('system_role_id')->references('id')->on('system_roles')->onDelete('CASCADE');
            
            // Foreign key referencing the 'group_roles' table with ON DELETE CASCADE
            $table->foreign('group_role_id')->references('id')->on('group_roles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
