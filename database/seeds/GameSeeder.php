<?php

use App\Game;
use App\Genre;
use App\Review;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Game::class, 15)->create();
        factory(Game::class, 15)->create()->each(function ($game){
            $game->save();
            
            factory(Review::class, 1)->create([
                "game_id" => $game->id,
                "user_id" => 1,
            ]);
                
            factory(Review::class, 1)->create([
                "game_id" => $game->id,
                "user_id" => 2,
            ]);
                
            factory(Genre::class, 1)->create()->each(function ($genre) use ($game){
                $game->genre_id = $genre->id;
                $game->save();
            });
            
    
            // factory(Genre::class, 1)->create()->each(function ($genre, $game){
            //     $genre->save();
            //     $genre->sync($game);
            // });


        });

        
    }
}
// $table->integer('game_id');
// $table->integer('user_id');