<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(\App\User::class, function (Faker $faker) {
    return [
        'user_id' => rand(00000,99999),
        'account_number' => rand(0000000000,9999999999),
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'dateofbirth' => $faker->date(),
        'profile_image' => $faker->imageUrl,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'account_type' => 1,
        'account_pin' => rand(00000,99999),
        'gender' => "Male",
        'email' => $faker->email,
        'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
        'show_pass' => 12345678,
        'status' => 1,
    ];
});
