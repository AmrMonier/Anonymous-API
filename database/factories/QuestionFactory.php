<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'content' => $faker->realText(100,1),
        'slug' =>  'question-' . $faker->unique()->numberBetween(1,2000)
    ];
});
