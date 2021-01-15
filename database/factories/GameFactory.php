<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween($min = 30, $max = 70),
        'score' => $faker->numberBetween($min = 0, $max = 20),
        'visible' => $faker->randomElement(['0' ,'1']),
        'activationCode' => $faker->swiftBicNumber,
        'pathImage' => $faker->imageUrl($width = 420 , $height = 580),
        // 'description' => $faker->text($maxNbChars = 3250),
        'description' => $faker->paragraphs($nbSentences = 30, $variableNbSentences = true),
        'releaseDate' => $faker->date($format = 'Y-m-d'),
        'company' => $faker->randomElement(['Ubisoft' ,'Bethesda', 'Activision', 'Konami', 'TEAM17', 'Electronic Arts', 'Capcom', 'Valve',
                                            'Square Enix', 'Devolver', 'Naughty Dog', 'CD PROJECT RED', 'FOCUS', 'Nintendo', 'SEGA', 'BUNGIE' ]),
        'pegi' => $faker->randomElement(['3' ,'7', '12', '16', '18']),
        'platform' => $faker->randomElement(['XBOX ONE', 'XBOX 360' ,'PC', 'Playsation 4', 'Playsation 3', 'Playsation 2',
                                                'Playsation 1', 'Nintendo Switch', 'Nintendo Wii'])
    ];
});