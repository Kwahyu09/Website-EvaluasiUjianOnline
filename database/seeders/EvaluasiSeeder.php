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
            'nama_mahasiswa'=> 'Ahmad Muhaimin',
            'npm_mahasiswa'=> 'G1A023001',
            'jawaban'=> 'opsi_a',
            'skor'=> '10',
            'soal_id' => '4',
            'ujian_id' => '2'
        ]);
    }
}
