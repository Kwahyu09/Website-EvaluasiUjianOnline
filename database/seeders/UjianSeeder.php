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
            'kd_ujian' => 'ts6781',
            'nama_ujian' => 'ujian modul 1',
            'kelas' => 'Kedokteran B 2020',
            'modul' => 'Sistem Saraf',
            'grupsoal' => 'Ulangan Harian',
            'slug' => 'ujian-modul-1',
            'tanggal' => '2023-03-20',
            'waktu_mulai' =>'13:00:00',
            'waktu_selesai' =>'14:00:00'
        ]);
        Ujian::create([
            'kd_ujian' => 'avd984',
            'nama_ujian' => 'ujian modul 2',
            'kelas' => 'Kedokteran B 2019',
            'modul' => 'Ilmu Penyakit Kulit &Kelamin',
            'grupsoal' => 'Ujian Tengah Semester',
            'slug' => 'ujian-modul-2',
            'tanggal' => '2023-03-25',
            'waktu_mulai' =>'08:00:00',
            'waktu_selesai' =>'09:30:00'
        ]);
        Ujian::create([
            'kd_ujian' => 'xca986',
            'nama_ujian' => 'ujian modul 3',
            'kelas' => 'Kedokteran A 2019',
            'modul' => 'Ilmu Penyakit Dalam',
            'grupsoal' => 'Ujian Akhir Semester',
            'slug' => 'ujian-modul-3',
            'tanggal' => '2023-03-24',
            'waktu_mulai' =>'12:00:00',
            'waktu_selesai' =>'13:30:00'
        ]);
    }
}
