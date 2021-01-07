<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Genre;
use Faker\Generator as Faker;

$factory->define(Genre::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Action' ,'Aventure', 'Role-playing', 'MMO', 'Simulation', 'Sports', 'Sandbox', 'Horreur']),
        'type' => $faker->randomElement(['FPS' ,'TPS', 'Survie', 'Battle Royal', 'Roguelikes', 'Courses', 'Tower defense', 'Combat', 'Tour par tour', 'Créatif']),
    ];
});
