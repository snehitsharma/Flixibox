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
        Schema::create('most_watched_current', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('flixi')->onDelete('cascade');
            $table->bigInteger('views_current_period')->default(0);
            $table->integer('rank')->nullable();
            $table->timestamp('period_start');
            $table->timestamp('period_end');
            $table->timestamps();
            
            $table->index(['rank', 'views_current_period']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('most_watched_current');
    }
};
