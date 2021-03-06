<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'price' => $faker->numberBetween($min = 30, $max = 70),
        'score' => $faker->numberBetween($min = 0, $max = 20),
        'quantity' => $faker->numberBetween($min = 10, $max = 50),
        'visible' => $faker->randomElement(['0' ,'1']),
        'activationCode' => $faker->swiftBicNumber,
        'pathImage' =>  '/images/games/' . $faker->randomElement(['animearena.jpg' ,'carlofduty.jpg', 'fifafighter.jpg', 'godoffather.jpg', 'gtaspring.jpg', 'halojesus.jpg', 'lineararfare.jpg', 'mortakombat.png',
                'needfosspeed.png', 'smashbrosse.jpg', 'sonichearth.jpg', 'superhalogalaxy.jpg', 'supermariogalaxy3.png', 'wariowarz.jpg', 'washdogs.jpg' ]),
        // 'description' => $faker->text($maxNbChars = 3250),
        'description' => $faker->paragraphs($nbSentences = 30, $variableNbSentences = true),
        'releaseDate' => $faker->date($format = 'Y-m-d'),
        'company' => $faker->randomElement(['Ubisoft' ,'Bethesda', 'Activision', 'Konami', 'TEAM17', 'Electronic Arts', 'Capcom', 'Valve',
                                            'Square Enix', 'Devolver', 'Naughty Dog', 'CD PROJECT RED', 'FOCUS', 'Nintendo', 'SEGA', 'BUNGIE' ]),
        'pegi' => $faker->randomElement(['3' ,'7', '12', '16', '18']),
        'platform' => $faker->randomElement(['XBOX ONE', 'XBOX 360' ,'PC', 'Playsation 4', 'Playsation 3', 'Playsation 2',
                                                'Playsation 1', 'Nintendo Switch', 'Nintendo Wii']),
        
    ];
});