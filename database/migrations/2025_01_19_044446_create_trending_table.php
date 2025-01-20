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
        Schema::create('trending', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('flixi')->onDelete('cascade');
            $table->decimal('trending_score', 8, 2)->default(0);
            $table->integer('rank')->nullable();
            $table->jsonb('metrics')->nullable();
            $table->timestamp('calculated_at');
            $table->timestamps();
            
            $table->index(['rank', 'trending_score']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trending');
    }
};
