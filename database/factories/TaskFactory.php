<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'name'        => $faker->unique()->word,
        'completed'   => false,
        'user_id'     => factory(User::class)->create()->id,
        'description' => $faker->sentence,
    ];
});

$factory->state(App\Task::class, 'completed', [
    'completed' => true
]);