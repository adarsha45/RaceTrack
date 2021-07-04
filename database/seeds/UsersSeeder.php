<?php


use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now= new DateTime;
        $email = config('app.userEmail');
        $name = config('app.userName');
        $password = config('app.userPassword');

        $users = [
            [
                'name' => $name,
                'email' => $email,
                'email_verified_at' => $now,
                'password' => Hash::make($password),
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
