<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->freeEmail,
        'phone' => $faker->tollFreePhoneNumber,
        'message' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});