<?php

namespace Database\Seeders;

use App\Models\Modul;
use Illuminate\Database\Seeder;

class ModulSeeder extends Seeder
{
    public function run()
    {
        Modul::create([
            'kd_modul' => 'SS18262S',
            'nama_modul' => 'Demam',
            'slug' => 'demam',
            'semester' => 5,
            'sks' => 3,
            'user_id' => 5
        ]);
        Modul::create([
            'kd_modul' => 'SS123W7G',
            'nama_modul' => 'Sistem Saraf',
            'slug' => 'sistem-saraf',
            'semester' => 5,
            'sks' => 3,
            'user_id' => 4
        ]);
        Modul::create([
            'kd_modul' => 'SS123SDF',
            'nama_modul' => 'Ilmu Penyakit Kulit &Kelamin',
            'slug' => 'ilmu-penyakit-kulit&Kelamin',
            'semester' => 7,
            'sks' => 3,
            'user_id' => 4
        ]);
        Modul::create([
            'kd_modul' => 'YYS23WG7',
            'nama_modul' => 'Ilmu Penyakit Dalam',
            'slug' => 'ilmu-penyakit-dalam',
            'semester' => 3,
            'sks' => 2,
            'user_id' => 5
        ]);
    }
}
