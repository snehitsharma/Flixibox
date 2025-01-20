<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;  

class MostWatchedCurrent extends Model
{
    protected $table = 'most_watched_current';
    protected $fillable = [
        'movie_id',
        'views_current_period',
        'rank',
        'period_start',
        'period_end'
    ];

    protected $casts = [
        'views_current_period' => 'integer',
        'rank' => 'integer',
        'period_start' => 'datetime',
        'period_end' => 'datetime'
    ];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Flixi::class, 'movie_id');
    }
}
