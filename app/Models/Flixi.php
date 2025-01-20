<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flixi extends Model
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
        'genres' => 'array',
        'release_date' => 'date'
    ];
}