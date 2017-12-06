<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'aaa@aaa.aaa';
        $user->password = bcrypt('hogehogeunko');
        $user->admin_flag = 1;
        $user->save();

        for($i=1;$i<10;$i++) {
            $user = new User();
            $user->email = $i . '@example.jp';
            $user->password = bcrypt('aaaaaa');
            $user->save();
        }
    }
}
