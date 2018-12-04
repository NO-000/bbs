<?php

use Illuminate\Database\Seeder;
use App\Models\Follow;
class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $follows = Factory(Follow::class,500)->make()->toArray();
        Follow::insert($follows);
    }
}