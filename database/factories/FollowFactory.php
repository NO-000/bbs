<?php

use Faker\Generator as Faker;

use App\Models\Follow;

$factory->define(Follow::class, function (Faker $faker) {

    $users = DB::table('users')->pluck('id');

    return [
        'followings_id' => $faker->randomElement($users),
        'followers_id' => $faker->randomElement($users),
    ];
});
