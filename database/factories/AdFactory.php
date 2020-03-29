<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ad;
use App\User;
use App\City;
use Faker\Generator as Faker;

$factory->define(Ad::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'city_id' => City::all()->random()->id,
        'name' => $faker->sentence,
        'price' => $faker->randomFloat(2, 0, 999999),
        'currency' => $faker->randomElement(['Lei', 'Eur']),
        'description' => $faker->paragraphs(2, true)
    ];
});
