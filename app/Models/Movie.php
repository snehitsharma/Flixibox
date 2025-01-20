<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'flixi';

    protected $fillable = [
        'title',
        'overview',
        'release_date',
        'vote_average',
        'poster_path',
        'backdrop_path',
        'genres',
        'runtime'
    ];

    protected $casts = [
        'genres' => 'array'  // Since genres are stored in JSON in your flixi table
    ];
}