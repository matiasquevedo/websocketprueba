<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    return [
        'title'=>$faker->word,
        'slug'=>$faker->slug,
        'color'=>$faker->hexcolor,
        'description'=>$faker->text(20),
        'price'=>$faker->randomDigitNotNull,
        'discount'=>$faker->randomDigitNotNull,
        'priceDiscount'=>$faker->randomDigitNotNull,
    ];
});
