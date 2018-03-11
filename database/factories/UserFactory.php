<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

/**
 * Generate posts.
 */
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now')
    ];
});

/**
 * Generate tags.
 * Works fine until 100 unique tags
 */
$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});

/**
 * Generate comments.
 * I must to set here, how many user or post has already.
 */
$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->unique()->randomDigitNotNull,
        'user_id' => 1,
        'body' => $faker->sentence,
    ];
});