<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kendaraans')->insert([
            'id_jalur' => '1',
            'no_kendaraan' => '31241NTR69696',
            'no_plat' =>'N 1166 AA',
            'jenis_kendaraan'=>'Ferrari2010',
            'jumlah_penumpang' => 3
        ]);

        DB::table('kendaraans')->insert([
            'id_jalur' => '2',
            'no_kendaraan' => 'N3TT0R44R33',
            'no_plat' =>'B 4481 IT',
            'jenis_kendaraan'=>'Bison',
            'jumlah_penumpang' => 12
        ]);
    }
}
