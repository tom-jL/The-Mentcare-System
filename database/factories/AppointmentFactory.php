<?php

use App\Appointment;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    $start_time = now()->addHours(rand(1, 100));
    return [
        'patient_id' => \App\Patient::inRandomOrder()->first()->id,
        'employee_id' => \App\Employee::inRandomOrder()->first()->id,
        'start_time' => $start_time->format('Y-m-d H') . ':00',
        'finish_time' => $start_time->addHours(rand(1, 2))->format('Y-m-d H') . ':00',
    ];
});
