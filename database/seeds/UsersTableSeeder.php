<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::where('email','test@test.com')->first();

        if(!$user){
            \App\User::create([
                'name'=>'mosab',
                'email' =>'test@test.com',
                'role' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make('test@test.com')
            ]);
        }
    }
}
