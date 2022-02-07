<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'author' => $faker->name(),
        'subtitle' => $faker->optional($weight = 0.6)->paragraph(),
        'text' => $faker->text($maxNbChars = 350)
    ];
});
