<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 3) as $index) {
            \App\Comment::insert([
                'film_id' => $index,
                'user_id' => array_random(range(1, 3)),
                'comment' => \Faker\Provider\Lorem::sentence(),
            ]);
        }
    }
}
