<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;  

class Trending extends Model
{
    protected $table = 'trending';
    protected $fillable = [
        'movie_id',
        'trending_score',
        'rank',
        'metrics',
        'calculated_at'
    ];

    protected $casts = [
        'trending_score' => 'decimal:2',
        'rank' => 'integer',
        'metrics' => 'array',
        'calculated_at' => 'datetime'
    ];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Flixi::class, 'movie_id');
    }
}
