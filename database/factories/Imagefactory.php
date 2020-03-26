<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use App\Ad;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $adId = Ad::all()->random()->id;
    return [
        'ad_id' => $adId,
        'name' => 'placeholder.jpg',
        'default' => function () use ($adId) {
            if (Image::where('ad_id', $adId)->exists()) {
                return 0;
            } else {
                return 1;
            }
        }
    ];
});
