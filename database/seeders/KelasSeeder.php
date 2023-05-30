<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Kelas::create([
            'nama_kelas' => 'Kedokteran A',
            'slug' => 'Kedokteran-A-2019',
            'tahun_ajaran' => 2019,
            'jurusan' => 'kedokteran'
        ]);

        Kelas::create([
            'nama_kelas' => 'Kedokteran B',
            'slug' => 'Kedokteran-B-2019',
            'tahun_ajaran' => 2019,
            'jurusan' => 'kedokteran'
        ]);

        Kelas::create([
            'nama_kelas' => 'Kedokteran B',
            'slug' => 'Kedokteran-B-2020',
            'tahun_ajaran' => 2020,
            'jurusan' => 'kedokteran'
        ]);

    }
}
