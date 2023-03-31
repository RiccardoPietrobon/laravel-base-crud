<?php

namespace Database\Seeders;

use App\Models\Song;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 20; $i++) {
            $song = new Song;

            $song->title = $faker->word();
            $song->album = $faker->city();
            $song->author = $faker->city();
            $song->editor = $faker->time();
            $song->lenght = $faker->time();
            $song->poster = $faker->ean8();

            $song->save();
        }
    }
}
