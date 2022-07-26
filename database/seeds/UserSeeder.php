<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('user');
        foreach ($users as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->surname = $user['surname'];
            $newUser->address = $user['address'];
            $newUser->email = $user['email'];
            $newUser->date_of_birth = $user['date_of_birth'];
            $newUser->password = $user['password'];
            $newUser->slug = $user['slug'];
            $newUser->save();
        }
    }
}
