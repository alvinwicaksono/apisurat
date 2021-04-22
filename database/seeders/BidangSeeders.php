<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BidangSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bidang')->insert(
            [
                'kode_bidang' => 'B1',
                'nama_bidang' => 'Keesaan',
            ],
        );
        DB::table('bidang')->insert(
            [
                'kode_bidang' => 'B2',
                'nama_bidang' => 'Ketenagaan Gereja dan Pengembangannya',
            ],
        );
        DB::table('bidang')->insert(
            [
                'kode_bidang' => 'B3',
                'nama_bidang' => 'Studi dan Pengembangan'
            ],
        );
        DB::table('bidang')->insert(
            [
                'kode_bidang' => 'B4',
                'nama_bidang' => 'Kesaksian dan Pelayanan'
            ],
        );
        DB::table('bidang')->insert(
            [
                'kode_bidang' => 'B5',
                'nama_bidang' => 'Pembinaan Warga Gereja'
            ],
        );
        DB::table('bidang')->insert(
            [
                'kode_bidang' => 'B6',
                'nama_bidang' => 'Penatalayanan'
            ],
        );
        DB::table('bidang')->insert(
            [
                'kode_bidang' => 'B7',
                'nama_bidang' => 'Sekretariat Umum'
            ],
        );
    }
}
