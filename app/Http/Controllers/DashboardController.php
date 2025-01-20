<?php 
namespace App\Http\Controllers;

use App\Models\Flixi;
use App\Models\MostWatchedAllTime;
use App\Models\MostWatchedCurrent;
use App\Models\Trending;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB; 

class DashboardController extends Controller
{
    public function index()
    {
        $movieslist = Flixi::query()
            ->select(['id', 'title', 'release_date', 'genres'])
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get()
            ->map(function ($movie) {
                return [
                    'id' => $movie->id,
                    'title' => $movie->title,
                    'year' => date('Y', strtotime($movie->release_date)),
                    'genre' => $movie->genres,
                    'type' => 'match',
                    'matchPercentage' => 98
                ];
            });

        $trendingMovies = Trending::with(['movie' => function($query) {
            $query->select('id', 'title', 'release_date', 'genres');
        }])
        ->orderBy('trending_score', 'desc')
        ->limit(8)
        ->get()
        ->map(function ($trending) {
            return [
                'id' => $trending->movie->id,
                'title' => $trending->movie->title,
                'year' => date('Y', strtotime($trending->movie->release_date)),
                'genre' => $trending->movie->genres,
                'type' => 'trending',
                'trending_score' => $trending->trending_score
            ];
        });

        $mostwatchedalltime = MostWatchedAllTime::with(['movie' => function($query) {
            $query->select('id', 'title', 'release_date', 'genres');
        }])
        ->orderBy('total_views', 'desc')
        ->limit(8)
        ->get()
        ->map(function ($watched) {
            return [
                'id' => $watched->movie->id,
                'title' => $watched->movie->title,
                'year' => date('Y', strtotime($watched->movie->release_date)),
                'genre' => $watched->movie->genres,
                'type' => 'most_watched',
                'total_views' => $watched->total_views
            ];
        });

        $mostwatchedcurrent = MostWatchedCurrent::with(['movie' => function($query) {
            $query->select('id', 'title', 'release_date', 'genres');
        }])
        ->where('period_end', '>', now())
        ->orderBy('views_current_period', 'desc')
        ->limit(8)
        ->get()
        ->map(function ($current) {
            return [
                'id' => $current->movie->id,
                'title' => $current->movie->title,
                'year' => date('Y', strtotime($current->movie->release_date)),
                'genre' => $current->movie->genres,
                'type' => 'current',
                'current_views' => $current->views_current_period
            ];
        });

        return Inertia::render('Dashboard', [
            'movieslist' => $movieslist,
            'trendingMovies' => $trendingMovies,
            'mostwatchedalltime' => $mostwatchedalltime,
            'mostwatchedcurrent' => $mostwatchedcurrent
        ]);
    }
}