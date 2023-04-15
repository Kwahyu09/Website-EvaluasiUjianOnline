<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Database\Seeders\SoalSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DosenSeeder;
use Database\Seeders\KelasSeeder;
use Database\Seeders\ModulSeeder;
use Database\Seeders\UjianSeeder;
use Database\Seeders\GrupsoalSeeder;
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
        //     'password' => bcrypt('password')
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

        $this->call([
            DosenSeeder::class
        ]);
        $this->call([
            KelasSeeder::class
        ]);
        $this->call([
            UjianSeeder::class
        ]);
        $this->call([
            ModulSeeder::class
        ]);
        $this->call([
            GrupsoalSeeder::class
        ]);
        $this->call([
            SoalSeeder::class
        ]);
    }
}
