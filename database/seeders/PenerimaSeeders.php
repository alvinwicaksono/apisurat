<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PenerimaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penerima')->insert(
            [
                'bidang' => 'Sekretariat',
                'kepala_bidang' => 'Sekretariat',
                'email'=> 'sekretariat@gkj.or.id',
                'noHp'=> '0812121212'
            ],
        );
    }
}
