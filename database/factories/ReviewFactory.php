<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'rate' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 5),
        'comment' => $faker->text($maxNbChars = 250),
    ];
});
