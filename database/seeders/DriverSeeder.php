<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drivers')->insert([
            'id_kendaraan' => '1',
            'nama' => 'Suparman',
            'NIP' =>12345,
            'contac_person'=>'082220508262',
        ]);

        DB::table('drivers')->insert([
            'id_kendaraan' => '2',
            'nama' => 'Buttman',
            'NIP' =>54321,
            'contac_person'=>'641640239142',
        ]);
    }
}
