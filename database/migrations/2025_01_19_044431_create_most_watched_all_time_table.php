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
        Schema::create('most_watched_all_time', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('flixi')->onDelete('cascade');
            $table->bigInteger('total_views')->default(0);
            $table->integer('rank')->nullable();
            $table->timestamp('last_calculated')->nullable();
            $table->timestamps();
            
            $table->index(['rank', 'total_views']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('most_watched_all_time');
    }
};
