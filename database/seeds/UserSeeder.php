<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->delete();
        \App\User::create([
           'name'=>'jar',
           'email'=>'jar@gmail.com',
           'password'=>Hash::make('jarjar'),
        ]);
    }
}
