<?php

namespace Database\Seeders;

use App\Models\Evaluasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EvaluasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evaluasi::create([
            'nama_evaluasi'=> 'evaluasi soal',
            'nama_mhs'=> 'Krisna Wahyudi',
            'jawaban'=> 'opsi_a',
            'tingkat_soal'=> 'sukar'
        ]);
    }
}
