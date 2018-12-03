<?php

use Faker\Generator as Faker;
use App\Models\Topic;

$factory->define(Topic::class, function (Faker $faker) {
    $users = DB::table('users')->pluck('id');
    $categories = DB::table('categories')->pluck('id');
    return [
        'title' => $faker->text,
        'content' => $faker->text,
        'user_id' => $faker->randomElement($users),
        'category_id' => $faker->randomElement($categories),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
