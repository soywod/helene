<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker)
{
	return [
		'name'           => $faker->name,
		'email'          => $faker->email,
		'password'       => bcrypt(str_random(10)),
		'remember_token' => str_random(10),
	];
});

$factory->define(App\Work::class, function (Faker\Generator $faker)
{
	return [
		'category_id' => rand(1, 4),
		'user_id'     => 1,
		'title'       => str_random(16),
		'size'        => str_random(16),
		'box_price'   => rand(1, 10),
		'unbox_price' => rand(1, 10),
		'thumbnail'   => 'img' . rand(1, 8) . '.jpg',
	];
});
