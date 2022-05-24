<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenumpangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penumpangs')->insert([
            'id_jalur'=>'1',
            'kode_penumpang' => 'S3NP4I',
            'atas_nama' =>'Kawai-san',
        ]);
    }
}
