<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Document;
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

$factory->define(Document::class, function (Faker $faker) {
    return [
				'name' => $faker->word,
				'project_id' =>factory(App\Project::class),
				'description' =>$faker->sentence()
        
    ];
});