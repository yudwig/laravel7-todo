<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Task::class, function (Faker $faker, $attributes) {
    return [
        'title' => $faker->sentence(2),
        'completed' => 0,
        'category_id' => $attributes['category_id']
    ];
});
