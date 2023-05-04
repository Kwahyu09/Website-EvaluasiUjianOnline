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
            'nik' => '382619030282',
            'username' => 'krisna',
            'email' => 'krisnawahyudi2017@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Rolin Sanjaya',
            'nik' => '938362930387',
            'username' => 'rolin',
            'email' => 'rolinsans@gmail.com',
            'role' => 'Staf',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Surya Saputra',
            'username' => 'Surya',
            'nik' => '938362930353',
            'email' => 'surya@gmail.com',
            'role' => 'Ketua',
            'password' => Hash::make('password')
        ]);

        $mahasiswa = User::create([
            'nama' => 'Yusuf Maulana',
            'nik' => '9383629398362',
            'username' => 'Yusuf',
            'email' => 'yusuf@gmail.com',
            'role' => 'Ketua',
            'password' => Hash::make('password')
        ]);
    }
}
