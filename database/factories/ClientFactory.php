<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Client;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Client::class, function (Faker $faker) {
    return [
				'first_name' => $faker->word,
				'last_name'=> $faker->word,
        'email' => $faker->unique()->safeEmail,
				'phone' => $faker->phoneNumber,
				'website'=> $faker->url,
				'skype' =>$faker->word,
				'company'=>$faker->company ,
				'status' =>$faker->randomElement($array = ['active', 'inactive']),
				'country'=>$faker->country,
				'created_by'=>  factory(App\User::class),
        
    ];
});