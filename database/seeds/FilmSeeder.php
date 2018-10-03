<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Film;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $film = new Film();
        $film->name = 'Justice League';
        $film->description = 'Fueled by his restored faith in humanity and inspired by Superman\'s selfless act, Bruce Wayne enlists the help of his newfound ally, Diana Prince, to face an even greater enemy.';
        $film->release_date = new \Carbon\Carbon('2017-11-17');
        $film->rating = array_random(range(1, 5));
        $film->ticket_price = $faker->randomDigitNotNull;
        $film->country_id = \App\Country::whereName('USA')->first()->id;
        $film->photo = 'justice_league.jpg';
        $film->save();
        $film->genres()->attach([1,7,8]);

        $film = new Film();
        $film->name = 'Mission: Impossible - Fallout';
        $film->description = 'Ethan Hunt and his IMF team, along with some familiar allies, race against time after a mission gone wrong.';
        $film->release_date = new \Carbon\Carbon('2018-07-27');
        $film->rating = array_random(range(1, 5));
        $film->ticket_price = $faker->randomDigitNotNull;
        $film->country_id = \App\Country::whereName('USA')->first()->id;
        $film->photo = 'mission_impossible.jpg';
        $film->save();
        $film->genres()->attach([1,3]);

        $film = new Film();
        $film->name = '3 Idiots';
        $film->description = 'Two friends are searching for their long lost companion. They revisit their college days and recall the memories of their friend who inspired them to think differently, even as the rest of the $film->orldcaled them "idiots".';
        $film->release_date = new \Carbon\Carbon('2009-12-25');
        $film->rating = array_random(range(1, 5));
        $film->ticket_price = $faker->randomDigitNotNull;
        $film->country_id = \App\Country::whereName('India')->first()->id;
        $film->photo = '3_idiots.jpg';
        $film->save();
        $film->genres()->attach([4,6]);
    }
}
