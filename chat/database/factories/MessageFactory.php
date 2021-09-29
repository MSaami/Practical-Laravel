<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Message;
use App\User;
use Illuminate\Support\Str;
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

$factory->define(Message::class, function (Faker $faker) {
    return [
        'body' => $faker->realText(),
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
