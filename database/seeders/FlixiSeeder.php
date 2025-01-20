<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flixi;

class FlixiSeeder extends Seeder
{
    public function run()
    {
        $movies = [
            [
                'title' => 'Inception',
                'overview' => 'A thief who steals corporate secrets through dream-sharing technology is given the task of planting an idea into a CEO\'s mind.',
                'release_date' => '2010-07-16',
                'vote_average' => 8.4,
                'poster_path' => '/9gk7adHYeDvHkCSEqAvQNLV5Uge.jpg',
                'backdrop_path' => '/s3TBrRGB1iav7gFOCNx3H31MoES.jpg',
                'genres' => json_encode(['Action', 'Science Fiction', 'Drama']),
                'runtime' => 148
            ],
            [
                'title' => 'The Dark Knight',
                'overview' => 'Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'release_date' => '2008-07-18',
                'vote_average' => 8.5,
                'poster_path' => '/qJ2tW6WMUDux911r6m7haRef0WH.jpg',
                'backdrop_path' => '/hkBaDkMWbLaf8B1lsWsKX7Ew3Xq.jpg',
                'genres' => json_encode(['Action', 'Crime', 'Drama']),
                'runtime' => 152
            ],
            [
                'title' => 'The Matrix',
                'overview' => 'A computer programmer discovers that reality as he knows it is a simulation created by machines.',
                'release_date' => '1999-03-31',
                'vote_average' => 8.7,
                'poster_path' => '/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg',
                'backdrop_path' => '/7u3pxc0K1wx32IleAkLv78MKgrw.jpg',
                'genres' => json_encode(['Action', 'Science Fiction']),
                'runtime' => 136
            ],
            [
                'title' => 'Pulp Fiction',
                'overview' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine.',
                'release_date' => '1994-10-14',
                'vote_average' => 8.9,
                'poster_path' => '/d5iIlFn5s0ImszYzBPb8JPIfbXD.jpg',
                'backdrop_path' => '/suaEOtk1N1sgg2MTM7oZd2cfVp3.jpg',
                'genres' => json_encode(['Crime', 'Drama']),
                'runtime' => 154
            ],
            [
                'title' => 'Interstellar',
                'overview' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'release_date' => '2014-11-07',
                'vote_average' => 8.6,
                'poster_path' => '/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg',
                'backdrop_path' => '/xJHokMbljvjADYdit5fK5VQsXEG.jpg',
                'genres' => json_encode(['Adventure', 'Drama', 'Science Fiction']),
                'runtime' => 169
            ],
            [
                'title' => 'The Shawshank Redemption',
                'overview' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'release_date' => '1994-09-23',
                'vote_average' => 8.7,
                'poster_path' => '/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg',
                'backdrop_path' => '/kXfqcdQKsToO0OUXHcrrNCHDBzO.jpg',
                'genres' => json_encode(['Drama', 'Crime']),
                'runtime' => 142
            ],
            [
                'title' => 'Fight Club',
                'overview' => 'An insomniac office worker and a devil-may-care soapmaker form an underground fight club.',
                'release_date' => '1999-10-15',
                'vote_average' => 8.4,
                'poster_path' => '/pB8BM7pdSp6B6Ih7QZ4DrQ3PmJK.jpg',
                'backdrop_path' => '/rr7E0NoGKxvbkb89eR1GwfoYjpA.jpg',
                'genres' => json_encode(['Drama', 'Thriller']),
                'runtime' => 139
            ],
            [
                'title' => 'Goodfellas',
                'overview' => 'The story of Henry Hill and his life in the mob, covering his relationship with his wife Karen Hill and his mob partners Jimmy Conway and Tommy DeVito.',
                'release_date' => '1990-09-12',
                'vote_average' => 8.5,
                'poster_path' => '/aKuFiU82s5ISJpGZp7YkIr3kCUd.jpg',
                'backdrop_path' => '/sw7mordbZxgITU877yTpZCud90M.jpg',
                'genres' => json_encode(['Drama', 'Crime']),
                'runtime' => 145
            ],
            [
                'title' => 'The Godfather',
                'overview' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'release_date' => '1972-03-14',
                'vote_average' => 8.7,
                'poster_path' => '/3bhkrj58Vtu7enYsRolD1fZdja1.jpg',
                'backdrop_path' => '/tmU7GeKVybMWFButWEGl2M4GeiP.jpg',
                'genres' => json_encode(['Drama', 'Crime']),
                'runtime' => 175
            ],
            [
                'title' => 'Forrest Gump',
                'overview' => 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75.',
                'release_date' => '1994-07-06',
                'vote_average' => 8.5,
                'poster_path' => '/saHP97rTPS5eLmrLQEcANmKrsFl.jpg',
                'backdrop_path' => '/3h1JZGDhZ8nzxdgvkxha0qBqi05.jpg',
                'genres' => json_encode(['Drama', 'Romance', 'Comedy']),
                'runtime' => 142
            ],
            [
                'title' => 'The Silence of the Lambs',
                'overview' => 'A young FBI cadet must receive the help of an incarcerated and manipulative cannibal killer to help catch another serial killer.',
                'release_date' => '1991-02-14',
                'vote_average' => 8.3,
                'poster_path' => '/rplLJ2hPcOQmkFhTqUte0MkEaO2.jpg',
                'backdrop_path' => '/mfwq2nMBzArzQ7Y9RKE8SKeeTkg.jpg',
                'genres' => json_encode(['Crime', 'Drama', 'Thriller']),
                'runtime' => 118
            ],
            [
                'title' => 'Gladiator',
                'overview' => 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery.',
                'release_date' => '2000-05-05',
                'vote_average' => 8.2,
                'poster_path' => '/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg',
                'backdrop_path' => '/gavyCu1UaTaTNPsVaGXT6pe5u24.jpg',
                'genres' => json_encode(['Action', 'Drama', 'Adventure']),
                'runtime' => 155
            ]
        ];

        foreach ($movies as $movie) {
            Flixi::create($movie);
        }
    }
}   