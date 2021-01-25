<?php

use App\Game;
use App\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = Game::all();
        factory(Genre::class, 10)->create()->each(function ($genre) use ($games) {
            $genre->games()->attach(
                $games->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
