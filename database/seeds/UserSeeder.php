<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@design.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Noman shah";
            $user->email = "admin@design.com";
            $user->password = Hash::make('password');
            $user->save();
        }
    }
}
