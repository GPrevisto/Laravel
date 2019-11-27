<?php

use App\Plant;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/* @var Illuminate\Database\Eloquent\Factory $factory */




$factory->define(App\Plant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'scientific_name' => $faker->sentence,
        'description' => $faker->paragraph,
        'isCarnivora' => $faker->boolean(),
      
    ];
});



