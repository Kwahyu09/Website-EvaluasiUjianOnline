<?php

namespace Database\Seeders;

use App\Models\HasilUjian;
use Illuminate\Database\Seeder;

class HasilUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HasilUjian::create([
            'nama_mahasiswa' => 'Muhammad Riski',
            'npm_mahasiswa' => 'G1A019082',
            'nilai' => '90',
            'ujian_id' => '1'
        ]);
        HasilUjian::create([
            'nama_mahasiswa' => 'Mawar Puspita',
            'npm_mahasiswa' => 'G1A019023',
            'nilai' => '95',
            'ujian_id' => '1'
        ]);

    }
}
