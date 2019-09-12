<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');

        Model::unguard();
        $this->call(cf_users_TableSeeder::class);
        $this->call(cf_roles_TableSeeder::class);
        Model::reguard();
    }
}
