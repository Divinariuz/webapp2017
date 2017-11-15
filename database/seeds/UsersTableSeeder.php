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
        for($i=1;$i<100;$i++) {
            $user = new User();
            $user->email = $i . '@example.jp';
            $user->password = 'hogehogeunko';
            $user->save();
        }
    }
}
