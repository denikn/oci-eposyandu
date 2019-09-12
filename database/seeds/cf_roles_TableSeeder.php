<?php

use Illuminate\Database\Seeder;

class cf_roles_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('cf_roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $datas = [
            [
                'name' => 'admin',
                'description' => 'Administrator'
            ],
            [
                'name' => 'kapus',
                'description' => 'Kepala Puskesmas'
            ],
            [
                'name' => 'petugas',
                'description' => 'Petugas Puskesmas'
            ],
            [
                'name' => 'kader',
                'description' => 'Kader Posyandu'
            ],
            [
                'name' => 'ortu',
                'description' => 'Orang Tua Anak'
            ]
        ];

        foreach ($datas as $q) {
            DB::table('cf_roles')->insert([
                'name' => $q['name'],
                'description' => $q['description']
            ]);
        }
    }
}
