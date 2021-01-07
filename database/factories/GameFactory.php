<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween($min = 30, $max = 70),
        'rate' => $faker->numberBetween($min = 0, $max = 20),
        'activationCode' => $faker->swiftBicNumber,
        'pathImage' => $faker->imageUrl($width = 640, $height = 480),
        'description' => $faker->text($maxNbChars = 250),
        'releaseDate' => $faker->date($format = 'Y-m-d'),
        'company' => $faker->randomElement(['Ubisoft' ,'Bethesda', 'Activision', 'Konami', 'TEAM17', 'Electronic Arts', 'Capcom', 'Valve',
                                            'Square Enix', 'Devolver', 'Naughty Dog', 'CD PROJECT RED', 'FOCUS', 'Nintendo', 'SEGA', 'BUNGIE' ]),
        'pegi' => $faker->randomElement(['3' ,'7', '12', '16', '18']),
        'platform' => $faker->randomElement(['XBOX ONE', 'XBOX 360' ,'PC', 'Playsation 4', 'Playsation 3', 'Playsation 2',
                                                'Playsation 1', 'Nintendo Switch', 'Nintendo Wii'])
    ];
});

// $table->id();
//             $table->string('name');
//             $table->integer('price');
//             $table->integer('rate');
//             $table->string('activationCode'); // AZftuIG41084fEj0hkZSef450682
//             $table->string('pathImage');
//             $table->string('description');
//             $table->date('releaseDate');
//             $table->string('company');
//             $table->integer('pegi');
//             $table->string('platform');
//             $table->timestamps();