<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MostWatchedAllTime extends Model
{
    protected $table = 'most_watched_all_time';
    protected $fillable = [
        'movie_id',
        'total_views',
        'rank',
        'last_calculated'
    ];

    protected $casts = [
        'total_views' => 'integer',
        'rank' => 'integer',
        'last_calculated' => 'datetime'
    ];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Flixi::class, 'movie_id');
    }
}
