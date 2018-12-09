<?php

use Faker\Generator as Faker;
use App\Models\Topic;

$factory->define(Topic::class, function (Faker $faker) {
    $users = DB::table('users')->pluck('id');
    $categories = DB::table('categories')->pluck('id');
    return [
        'title' => $faker->text(20),
        'content' => $faker->paragraph,
        'user_id' => $faker->randomElement($users),
        'category_id' => $faker->randomElement($categories),
        'reply_count' => 0,
        'view_count' => 0,
        'created_at' => date("Y-m-d H:i:s",time()),
        'updated_at' => $faker->dateTime($max = 'now'),
    ];
});
