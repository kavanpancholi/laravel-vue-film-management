<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::insert([
            [
                'name' => 'Action',
            ],
            [
                'name' => 'Romance',
            ],
            [
                'name' => 'Thriller',
            ],
            [
                'name' => 'Comedy',
            ],
            [
                'name' => 'Documentary',
            ],
            [
                'name' => 'Drama',
            ],
            [
                'name' => 'Sci-Fi',
            ],
            [
                'name' => 'Fantasy',
            ],
        ]);
    }
}
