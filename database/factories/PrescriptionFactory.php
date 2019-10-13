<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Prescription;
use Faker\Generator as Faker;

$factory->define(Prescription::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => rand(10, 99),
        'dosage' => $faker->sentence,
    ];
});
