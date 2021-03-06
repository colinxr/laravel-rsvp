<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'fist_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'postal' => $faker->postcode,
        'instagram' => $faker->userAgent,
        'role' => $faker->jobTitle,
        'comapny' => $faker->company,
        'guestOf' => $faker->name,
        'category' => $faker->randomElement(['vvip', 'sharp', 's/', 'contempo staff', 'vip']),
        'gender' => $faker->randomElement(['male', 'female']),
        'guest_firstName' => $faker->firstName,
        'guest_lastName' => $faker->lastName,
        'guest_email' => $faker->email,
        'status' => $faker->randomElement(['approved', 'pending']),
    ];
});
