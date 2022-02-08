<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'subtitle' => $faker->optional($weight = 0.6)->sentence(5),
        'text' => $faker->text($maxNbChars = 350),
        'user_id' => $faker->numberBetween(1, 50),
        'cat_id' => $faker->numberBetween(1, 6)
    ];
});
