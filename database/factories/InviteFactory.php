<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'fist_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'role' => $faker->jobTitle,
        'comapny' => $faker->company,
        'guestOf' => $faker->name,
        'category' => $faker->randomElement(['vvip', 'sharp', 's/', 'contempo staff', 'vip']),
        'gender' => $faker->randomElement(['male', 'female']),
    ];
});
