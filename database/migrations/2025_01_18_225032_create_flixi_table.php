<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('flixi', function (Blueprint $table) {
            $table->id();                                     // Auto-incrementing ID
            $table->string('title');                         // Movie title
            $table->text('overview')->nullable();            // Movie description
            $table->date('release_date')->nullable();        // Release date
            $table->decimal('vote_average', 3, 1)->nullable(); // Rating (like 8.5)
            $table->string('poster_path')->nullable();       // Movie poster image path
            $table->string('backdrop_path')->nullable();     // Movie backdrop image path
            $table->json('genres')->nullable();              // Movie genres
            $table->integer('runtime')->nullable();          // Movie duration in minutes
            $table->timestamps();                            // Created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('flixi');
    }
};