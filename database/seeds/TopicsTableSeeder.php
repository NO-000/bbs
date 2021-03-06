<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;
class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = Factory(Topic::class,2000)->make()->toArray();
        Topic::insert($topics);
    }
}
