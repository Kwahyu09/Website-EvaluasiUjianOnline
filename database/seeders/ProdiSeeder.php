<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Prodi::create([
            'nama_prodi' => 'Kedokteran',
            'slug' => 'kedokteran',
        ]);

        Prodi::create([
            'nama_prodi' => 'Pendidikan Profesi Dokter',
            'slug' => 'pendidikan-profesi-dokter',
        ]);
    }
}
