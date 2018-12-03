<?php

use Illuminate\Database\Seeder;
use Illuminate\Validation\Factory;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = Factory(User::class,500)->make();
        User::insert($users->makeVisible(['password','remember_token'])->toArray());
    }
}
