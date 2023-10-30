<?php

namespace Database\Seeders;

use App\Models\Ujian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Ujian::create([
            'kd_ujian' => 'JA9WJDAK',
            'nama_ujian' => 'Ulangan Tengah Semester Demam',
            'kelas' => 'kedokteran-a-2019',
            'modul' => 'Sistem Saraf',
            'grupsoal' => 'ujian-tengah-semester',
            'slug' => 'ulangan-tengah-semester-demam',
            'acak_soal' => 'Y',
            'tanggal' => '2023-06-15',
            'waktu_mulai' =>'13:00:00',
            'waktu_selesai' =>'14:00:00',
            'user_id' => '5'
        ]);
        Ujian::create([
            'kd_ujian' => 'USJA9WS2',
            'nama_ujian' => 'Ulangan Harian Demam',
            'kelas' => 'kedokteran-b-2023',
            'modul' => 'Demam',
            'grupsoal' => 'ulangan-harian',
            'slug' => 'ulangan-harian-demam',
            'acak_soal' => 'Y',
            'tanggal' => '2023-06-17',
            'waktu_mulai' =>'08:00:00',
            'waktu_selesai' =>'09:30:00',
            'user_id' => '5'
        ]);
        Ujian::create([
            'kd_ujian' => '9IKSAFAS',
            'nama_ujian' => 'Ujian Akhir Semester',
            'kelas' => 'kedokteran-b-2023',
            'acak_soal' => 'Y',
            'modul' => 'Ilmu Penyakit Dalam',
            'grupsoal' => 'ujian-akhir-semester',
            'slug' => 'ujian-akhir-semester',
            'tanggal' => '2023-06-20',
            'waktu_mulai' =>'12:00:00',
            'waktu_selesai' =>'13:30:00',
            'user_id' => '4'
        ]);
    }
}
