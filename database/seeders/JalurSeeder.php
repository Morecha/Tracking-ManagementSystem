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
            'harga'=>100000
        ]);

        DB::table('jalurs')->insert([
            'kota_asal'=>'Surabaya',
            'kota_tujuan'=>'Malang',
            'harga'=>100000
        ]);
    }
}
