<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Clinic\Models\Doctor;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Doctor::class, function (Faker $faker) {
    return [
        'specialization_id' => rand(1, 10),
        'surname' => $faker->lastName,
        'name' => $faker->firstNameMale,
    ];
});
