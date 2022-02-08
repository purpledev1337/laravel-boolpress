<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cat;
use Faker\Generator as Faker;

$factory->define(Cat::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement(['general', 'tech', 'gaming', 'economy', 'sports', 'politics'])
    ];
});
