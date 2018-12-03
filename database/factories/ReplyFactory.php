<?php

use Faker\Generator as Faker;

use App\Models\Reply;

$factory->define(Reply::class, function (Faker $faker) {

    $users = DB::table('users')->pluck('id');

    $topics = DB::table('topics')->pluck('id');

    return [
        'content' => $faker->text,
        'user_id' => $faker->randomElement($users),
        'topic_id' => $faker->randomElement($topics),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
