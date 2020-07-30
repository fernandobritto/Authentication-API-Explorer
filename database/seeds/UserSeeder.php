<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Str;
//use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name' => Str::random(10),
//            'email' => Str::random(10).'@gmail.com',
//            'password' => Hash::make('password'),
//            'updated_at' => Carbon::now(),
//            'created_at' => Carbon::now(),
//        ]);

        User::create([
            'name' => 'Fernando Britto',
            'email' => 'fernando@explorer.com',
            'password' => Hash::make('password'),
        ]);

    }
}
