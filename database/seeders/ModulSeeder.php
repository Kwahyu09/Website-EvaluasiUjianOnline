<?php

namespace Database\Seeders;

use App\Models\Modul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modul::create([
            'kd_modul' => 'SS123W7',
            'nama_modul' => 'Sistem Saraf',
            'slug' => 'sistem-saraf',
            'semester' => 5,
            'sks' => 3,
            'user_id' => 3
        ]);
        Modul::create([
            'kd_modul' => 'SS123SDF',
            'nama_modul' => 'Ilmu Penyakit Kulit &Kelamin',
            'slug' => 'ilmu-penyakit-kulit&Kelamin',
            'semester' => 7,
            'sks' => 3,
            'user_id' => 3
        ]);
        Modul::create([
            'kd_modul' => 'YYS23W7',
            'nama_modul' => 'Ilmu Penyakit Dalam',
            'slug' => 'ilmu-penyakit-dalam',
            'semester' => 3,
            'sks' => 2,
            'user_id' => 4
        ]);
    }
}
