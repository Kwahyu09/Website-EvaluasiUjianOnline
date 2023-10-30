<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Krisna Wahyudi',
            'nip' => '382619030282826109',
            'username' => 'krisna',
            'email' => 'krisnawahyudi2017@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Rolin Sanjaya',
            'nik' => '938362930387892745',
            'username' => 'rolin',
            'email' => 'rolinsans@gmail.com',
            'role' => 'Staf',
            'password' => Hash::make('password')
        ]);
        User::create([
            'nama' => 'Melati',
            'nik' => '988362930762592843',
            'username' => 'melati',
            'email' => 'melati@gmail.com',
            'role' => 'Staf',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Surya Saputra',
            'username' => 'Surya',
            'nip' => '938362930353234565',
            'email' => 'surya@gmail.com',
            'role' => 'Ketua',
            'password' => Hash::make('password')
        ]);
        User::create([
            'nama' => 'Wahyudi Saputra',
            'username' => 'wahyu',
            'nip' => '892745928204528985',
            'email' => 'wahyu@gmail.com',
            'role' => 'Ketua',
            'password' => Hash::make('password')
        ]);

        User::create([
            'npm' => 'G1A019083',
            'nama' => 'Renal Akbar',
            'username' => 'renal123',
            'role' => 'Mahasiswa',
            'email' => 'renal@gmail.com',
            'kelas_id' => '1',
            'password' => Hash::make('password')
        ]);
        User::create([
            'npm' => 'G1A019089',
            'nama' => 'Yusuf Nasrulah',
            'username' => 'yusuf123',
            'role' => 'Mahasiswa',
            'email' => 'yusuf543@gmail.com',
            'kelas_id' => '1',
            'password' => Hash::make('password')
        ]);
        User::create([
            'npm' => 'G1A023001',
            'nama' => 'Ahmad Muhaimin',
            'username' => 'ahmatmuh',
            'role' => 'Mahasiswa',
            'email' => 'ahmat@gmail.com',
            'kelas_id' => '2',
            'password' => Hash::make('password')
        ]);
        User::create([
            'npm' => 'G1A023002',
            'nama' => 'Siti Nurbaya',
            'username' => 'siti23',
            'role' => 'Mahasiswa',
            'email' => 'siti@gmail.com',
            'kelas_id' => '2',
            'password' => Hash::make('password')
        ]);
        User::create([
            'npm' => 'G1A023003',
            'nama' => 'Bung Yoza',
            'username' => 'bungyoz',
            'role' => 'Mahasiswa',
            'email' => 'bungyoza@gmail.com',
            'kelas_id' => '2',
            'password' => Hash::make('password')
        ]);
        User::create([
            'npm' => 'G1A023004',
            'nama' => 'Yoga Sanjaya',
            'username' => 'yogas7',
            'role' => 'Mahasiswa',
            'email' => 'yoga@gmail.com',
            'kelas_id' => '2',
            'password' => Hash::make('password')
        ]);
        User::create([
            'npm' => 'G1A023005',
            'nama' => 'Devi Syahputri',
            'username' => 'devisah',
            'role' => 'Mahasiswa',
            'email' => 'devi@gmail.com',
            'kelas_id' => '2',
            'password' => Hash::make('password')
        ]);
    }
}
