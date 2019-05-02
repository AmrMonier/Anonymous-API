<?php

use Faker\Generator as Faker;

$factory->define(App\Answers::class, function (Faker $faker) {
    return [
        'answer' => $faker->realText(200,3)
    ];
});
