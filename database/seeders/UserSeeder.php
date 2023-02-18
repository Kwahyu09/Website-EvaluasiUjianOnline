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
            'username' => 'krisna',
            'email' => 'krisnawahyudi@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Rolin Sanjaya',
            'username' => 'rolin',
            'email' => 'rolinsans@gmail.com',
            'role' => 'Staf',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Surya Saputra',
            'username' => 'Surya',
            'email' => 'surya@gmail.com',
            'role' => 'Ketua',
            'password' => Hash::make('password')
        ]);

        $mahasiswa = User::create([
            'nama' => 'Yusuf Maulana',
            'username' => 'Yusuf',
            'email' => 'yusuf@gmail.com',
            'role' => 'Mahasiswa',
            'password' => Hash::make('password')
        ]);

        Mahasiswa::create([
            'user_id' => $mahasiswa->id,
            'npm' => 'G1A020019'
        ]);
    }
}
