<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'role_id' => 1,
            'name' => 'ahmed ramzan',
            'email' => 'ahmed@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'kamran yaseen',
            'email' => 'kamran@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'role_id' => 3,
            'name' => 'sanan uzair',
            'email' => 'sanan@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
