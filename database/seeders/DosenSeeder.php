<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosen::create([
            'prodi_id' => '1',
            'nip' => '113342113421426487',
            'nama_dos' => 'dr.AHMAD AZMI NASUTION M.Biomed',
            'slug' => 'ahmad-asmi-nasution',
            'jabatan' => 'Lektor',
            'gol_regu' => 'III/B',
            'jenis_kel' => 'Laki-laki',
            'email' => 'ahminasution@gmail.com'
        ]);

        Dosen::create([
            'prodi_id' => '1',
            'nip' => '113342110912742346',
            'nama_dos' => 'DEBIE RIZQOH S.Si,M.Biomed',
            'slug' => 'Debie-risqoh',
            'jabatan' => 'Sekretaris',
            'gol_regu' => 'II/A',
            'jenis_kel' => 'Perempuan',
            'email' => 'debie@gmail.com'
        ]);
        Dosen::create([
            'prodi_id' => '1',
            'nip' => '918392183912524584',
            'nama_dos' => 'dr. DESSY TRIANA M.Biomed',
            'slug' => 'desy-tryana',
            'jabatan' => 'Lektor',
            'gol_regu' => 'III/A',
            'jenis_kel' => 'Perempuan',
            'email' => 'dessy@gmail.com'
        ]);
        Dosen::create([
            'prodi_id' => '1',
            'nip' => '918392183987987523',
            'nama_dos' => 'dr. MAKBRURI M.Biomed',
            'slug' => 'makbruri',
            'jabatan' => '',
            'gol_regu' => 'III/A',
            'jenis_kel' => 'Laki-laki',
            'email' => 'makbruri@gmail.com'
        ]);
        Dosen::create([
            'prodi_id' => '2',
            'nip' => '918392183990764357',
            'nama_dos' => 'Ners DIAH AYU AGUSPA DITA M.Biomed',
            'slug' => 'diah-ayu',
            'jabatan' => 'Asisten Ahli',
            'gol_regu' => 'III/A',
            'jenis_kel' => 'Perempuan',
            'email' => 'diahayu@gmail.com'
        ]);
        Dosen::create([
            'prodi_id' => '2',
            'nip' => '918392183980758005',
            'nama_dos' => 'dr. SWANDITO WICAKSONO M.Biomed',
            'slug' => 'swandito-wicaksono',
            'jabatan' => 'Asisten Ahli',
            'gol_regu' => 'III/A',
            'jenis_kel' => 'Laki-laki',
            'email' => 'swandito@gmail.com'
        ]);
        Dosen::create([
            'prodi_id' => '2',
            'nip' => '918392183988563269',
            'nama_dos' => 'NIKKI ALDI MASSARDI S.Si, M.Biomed',
            'slug' => 'nikki-aldi-massardi',
            'jabatan' => '',
            'gol_regu' => 'III/A',
            'jenis_kel' => 'Laki-laki',
            'email' => 'nikkialdi@gmail.com'
        ]);
    }
}
