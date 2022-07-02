<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JalurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jalurs')->insert([
            'kota_asal'=>'Malang',
            'kota_tujuan'=>'Surabaya',
            'harga'=>100000,
            'keberangkatan'=>131500,
            'hari' => 1
        ]);

        DB::table('jalurs')->insert([
            'kota_asal'=>'Surabaya',
            'kota_tujuan'=>'Malang',
            'harga'=>100000,
            'keberangkatan'=>203000,
            'hari' => 2
        ]);
    }
}
