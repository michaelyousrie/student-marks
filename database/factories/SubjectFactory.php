<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    $marks = [20, 50, 100];

    return [
        'name'      => $faker->word,
        'max_mark'  => $marks[array_rand($marks)]
    ];
});
