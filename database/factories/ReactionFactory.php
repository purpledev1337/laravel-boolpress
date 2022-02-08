<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reaction;
use Faker\Generator as Faker;

$factory->define(Reaction::class, function (Faker $faker) {
    return [
        
        'name' => $faker -> unique() -> word()
    ];
});
