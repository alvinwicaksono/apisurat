<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Userseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Administrasi',
                'email' => 'admin@mail.com',
                'password' => Hash::make('Admin123'),
                'role' => '1'
            ],

        );

        DB::table('users')->insert(
            [
                'name' => 'Sekretaris Umum',
                'email' => 'sekum@mail.com',
                'password' => Hash::make('Admin123'),
                'role' => '2'
            ]

        );
    }
}
