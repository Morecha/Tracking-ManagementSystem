<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HariSeeder::class);
        $this->call(JalurSeeder::class);
        $this->call(KendaraanSeeder::class);
        $this->call(PenumpangSeeder::class);
        $this->call(DriverSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
