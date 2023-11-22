<?php

namespace Database\Seeders;

use App\Models\Grup_soal;
use Illuminate\Database\Seeder;

class GrupsoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grup_soal::create([
            'modul_id' => '1',
            'user_id' => '5',
            'nama_grup' => 'Ulangan Harian',
            'slug' => 'ulangan-harian'
        ]);

        Grup_soal::create([
            'modul_id' => '1',
            'user_id' => '5',
            'nama_grup' => 'Ujian Tengah Semester',
            'slug' => 'ujian-tengah-semester'
        ]);

        Grup_soal::create([
            'modul_id' => '2',
            'user_id' => '4',
            'nama_grup' => 'Ujian Akhir Semester',
            'slug' => 'ujian-akhir-semester'
        ]);
    }
}
