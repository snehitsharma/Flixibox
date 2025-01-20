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
        Schema::create('device_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('device_name');        // Like "Chrome on Windows"
            $table->string('device_type');        // desktop/mobile/tablet
            $table->string('ip_address');         // User's IP
            $table->string('location')->nullable(); // Optional location
            $table->timestamp('last_activity');    // Last active time
            $table->boolean('is_current_device')->default(false); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_sessions');
    }
};
