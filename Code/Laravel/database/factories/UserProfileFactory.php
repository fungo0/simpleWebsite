<?php

use Faker\Generator as Faker;

$factory->define(App\UserProfile::class, function (Faker $faker) {

	date_default_timezone_set('Asia/Taipei');

    return [
        'nickname' => $faker->userName,
        'age' => $faker->numberBetween($min = 1, $max = 120),
        'gender' => $faker->randomElement(['male', 'female']),
        'DOB' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'mobile' => $faker->phoneNumber,
        'country' => $faker->country,
    ];
});
