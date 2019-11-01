<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Transaction;
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

$factory->define(Transaction::class, function (Faker $faker) {
    return [
				'name' => $faker->word,
				'description'=>$faker->sentence(),
				'amount' => $faker->randomNumber(),
				'project_id' =>factory(App\Project::class),
				'income_source_id'=>factory(App\IncomeSource::class),
				'transaction_type_id'=>factory(App\TransactionType::class),
				'currency_id'=>factory(App\Currency::class),
    ];
});