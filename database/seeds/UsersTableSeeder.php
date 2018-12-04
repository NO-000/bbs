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
        User::insert([
            'name' => 'admin',
            'email' => '1234@123',
            'password' => Hash::make('123456'),
            'remember_token' => str_random(10),
            'avatar' => 'https://img.zcool.cn/community/01786557e4a6fa0000018c1bf080ca.png@1280w_1l_2o_100sh.png',
            'introduction' => '11111111111111',
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        $users = Factory(User::class,100)->make();
        User::insert($users->makeVisible(['password','remember_token'])->toArray());
    }
}
