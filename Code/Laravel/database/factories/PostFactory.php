<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 190),
        'body' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
