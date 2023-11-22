<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\SoalSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DosenSeeder;
use Database\Seeders\KelasSeeder;
use Database\Seeders\ModulSeeder;
use Database\Seeders\UjianSeeder;
use Database\Seeders\EvaluasiSeeder;
use Database\Seeders\GrupsoalSeeder;
use Database\Seeders\HasilUjianSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DosenSeeder::class,
            KelasSeeder::class,
            UjianSeeder::class,
            ModulSeeder::class,
            GrupsoalSeeder::class,
            SoalSeeder::class,
            HasilUjianSeeder::class,
            EvaluasiSeeder::class,
        ]);
    }
}
