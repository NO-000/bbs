<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;
class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $replies = Factory(Reply::class,500)->make()->toArray();
        Reply::insert($replies);
    }
}
