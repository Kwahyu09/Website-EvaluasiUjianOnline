<?php

namespace Database\Seeders;

use App\Models\soal;
use App\Models\User;
use App\Models\admin;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\modul;
use App\Models\staff;
use App\Models\Ujian;
use App\Models\evaluasi;
use App\Models\Grup_soal;
use App\Models\Mahasiswa;
use App\Models\Ketuasekretaris;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(5)->create();

        // admin::create([
        //     'name' => 'Krisna Wahyudi',
        //     'username' => 'wahyu',
        //     'email' => 'wahyu@gmail.com',
        //     'password' => bcrypt('wahyupass')
        // ]);

        // admin::create([
        //     'name' => 'Agnes Vera Nika',
        //     'username' => 'agnes',
        //     'email' => 'agnes@gmail.com',
        //     'password' => bcrypt('agnesspass')
        // ]);

        // staff::create([
        //     'name' => 'Hartono Saputra',
        //     'username' => 'hartono',
        //     'email' => 'hartono@gmail.com',
        //     'password' => bcrypt('hartonopass')
        // ]);
        // staff::create([
        //     'name' => 'Suryo Yakub',
        //     'username' => 'suryo',
        //     'email' => 'suryo@gmail.com',
        //     'password' => bcrypt('suryoopass')
        // ]);
        // staff::create([
        //     'name' => 'Yusuf Mulyadi',
        //     'username' => 'yusuf',
        //     'email' => 'yusuf@gmail.com',
        //     'password' => bcrypt('suryoopass')
        // ]);

        // Dosen::create([
        //     'nip' => '9820187291',
        //     'nama_dosen' => 'boko susilo',
        //     'jabatan' => 'Lektor',
        //     'gol_rg' => 'III/B',
        //     'jenis_kelamin' => 'L',
        //     'prodi' => 'Kedokteran',
        //     'email' => 'bokosusilo@unib.ac.id'
        // ]);

        // Dosen::create([
        //     'nip' => '2320187221',
        //     'nama_dosen' => 'azmi nasution',
        //     'jabatan' => 'Lektor',
        //     'gol_rg' => 'III/A',
        //     'jenis_kelamin' => 'L',
        //     'prodi' => 'kedokteran',
        //     'email' => 'azminasution@gmail.com'
        // ]);

        // Ketuasekretaris::create([
        //     'name' => 'Rolin Sans',
        //     'username' => 'rolin23',
        //     'email' => 'rolin23@gmail.com',
        //     'password' => bcrypt('rolinpass')
        // ]);

        modul::create([
            'kd_modul' => 'Ad4527',
            'nama_modul' => 'sistem saraf',
            'semester' => 3,
            'sks' => 2
        ]);

        // Mahasiswa::create([
        //     'kelas_id' =>1,
        //     'npm' => 'G1A019073',
        //     'nama' => 'Krisna Wahyudi'
        // ]);
        // Mahasiswa::create([
        //     'kelas_id' =>1,
        //     'npm' => 'G1A019068',
        //     'nama' => 'Rolin Sanjaya Tamba'
        // ]);
        // Mahasiswa::create([
        //     'kelas_id' =>1,
        //     'npm' => 'G1A020024',
        //     'nama' => 'Agnes Vera Nika'
        // ]);

        // Mahasiswa::create([
        //     'kelas_id' =>2,
        //     'npm' => 'G1A02002',
        //     'nama' => 'Desi Fitria'
        // ]);

        $this->call([
            UserSeeder::class
        ]);

        // Kelas::create([
        //     'nama_kelas' => 'Kedokteran A',
        //     'tahun_ajaran' => 2019,
        //     'jurusan' => 'kedokteran'
        // ]);

        // Kelas::create([
        //     'nama_kelas' => 'Kedokteran B',
        //     'tahun_ajaran' => 2019,
        //     'jurusan' => 'kedokteran'
        // ]);

        // Kelas::create([
        //     'nama_kelas' => 'Kedokteran B',
        //     'tahun_ajaran' => 2020,
        //     'jurusan' => 'kedokteran'
        // ]);

        Grup_soal::create([
            // 'modul_id' =>1,
            'nama_grup' => 'Grup 1'
        ]);

        Grup_soal::create([
            // 'modul_id' =>1,
            'nama_grup' => 'Grup 2'
        ]);

        Grup_soal::create([
            // 'modul_id' =>1,
            'nama_grup' => 'Grup 3'
        ]);

        Soal::create([
            'grup_soal_id' =>1,
            'kode_soal' => '12acas',
            'pertanyaan' => 'tenaga dokter yang diharapkan olehWHO (1978) dibawah ini kecuali?',
            'kunci' => 'Decision maker',
            'opsi_a' => 'Decision maker',
            'opsi_b' => 'Community leader',
            'opsi_c' => 'Experienced',
            'opsi_d' => 'Communicator',
            'bobot' => 10
        ]);

        Soal::create([
            'grup_soal_id' =>1,
            'kode_soal' => '12kads',
            'pertanyaan' => 'Enchepalomalacia berarti...',
            'kunci' => 'Pelabaran selaput otak',
            'opsi_a' => 'Peradangan otak',
            'opsi_b' => 'Pelunakan otak',
            'opsi_c' => 'Penumpukan darah pada otak',
            'opsi_d' => 'Pelabaran selaput otak',
            'bobot' => 10
        ]);

        Ujian::create([
            'modul_id' => 1,
            'kelas_id' =>1,
            'kd_ujian' => 'ts6781',
            'nama_ujian' => 'ujian modul 1',
            'skor' => 80
        ]);

        Evaluasi::create([
            'ujian_id'=>1,
            'mahasiswa_id'=>1,
            'soal_id' => 1,
            'nama_evaluasi'=> 'evaluasi soal',
            'jawaban'=> 'opsi_a',
            'tingkat_soal'=> 'sukar'
        ]);
    }
}
