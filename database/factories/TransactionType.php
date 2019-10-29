<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\TransactionType;
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

$factory->define(TransactionType::class, function (Faker $faker) {
    return [
				'name' => $faker->word,
				'created_by'=>  factory(App\User::class),
        
    ];
});