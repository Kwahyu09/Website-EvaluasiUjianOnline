<?php

namespace Database\Seeders;
use App\Models\soal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        soal::create([
            'kode_soal' => '12acas',
            'grup_soal_id' => '1',
            'pertanyaan' => 'tenaga dokter yang diharapkan olehWHO (1978) dibawah ini kecuali?',
            'kunci' => 'Decision maker',
            'opsi_a' => 'Decision maker',
            'opsi_b' => 'Community leader',
            'opsi_c' => 'Experienced',
            'opsi_d' => 'Communicator',
            'jawaban' => 'Community leader',
            'bobot' => 10
        ]);

        soal::create([
            'kode_soal' => '12kads',
            'grup_soal_id' => '1',
            'pertanyaan' => 'Enchepalomalacia berarti...',
            'kunci' => 'Pelabaran selaput otak',
            'opsi_a' => 'Peradangan otak',
            'opsi_b' => 'Pelunakan otak',
            'opsi_c' => 'Penumpukan darah pada otak',
            'opsi_d' => 'Pelabaran selaput otak',
            'jawaban' => 'Peradangan otak',
            'bobot' => 10
        ]);

        soal::create([
            'kode_soal' => '32adds',
            'grup_soal_id' => '2',
            'pertanyaan' => 'Berikut ini macam-macam penyakit pada otak adalah...',
            'kunci' => 'Pelabaran selaput otak',
            'opsi_a' => 'Peradangan otak',
            'opsi_b' => 'Pelunakan otak',
            'opsi_c' => 'Penumpukan darah pada otak',
            'opsi_d' => 'Pelabaran selaput otak',
            'jawaban' => 'Pelabaran selaput otak',
            'bobot' => 10
        ]);
    }
}
