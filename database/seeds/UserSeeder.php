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
        DB::table('users')->insert([
            'name' => "dems",
            'email' => "damien.genevee@hotmail.fr",
            'password' => Hash::make('dr9chk'),
            'remember_token' => str_random(10),
        ]);

    }
}
