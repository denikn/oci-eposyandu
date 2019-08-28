<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class cf_user_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cf_users')->insert([
            'fullname' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'status' => 1
        ]);
    }
}
