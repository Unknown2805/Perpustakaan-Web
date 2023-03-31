<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Identitas;
use Illuminate\Support\Facades\Hash;
class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kode_user' => 'A1',
            'fullname' => 'Admin e-perpus',
            'username' => 'Admin',
            'password' => Hash::make('password'),
            'verif' => 'verified',
            'role' => 'admin',
            'join_date' => '2023-01-01',
        ]);
        User::create([
            'kode_user' => 'A1',
            'fullname' => 'User e-perpus',
            'username' => 'User',
            'password' => Hash::make('password'),
            'verif' => 'verified',
            'role' => 'user',
            'join_date' => '2023-01-01',
        ]);
        Identitas::create([
            'nama_app' => 'e-perpus',
            'email_app' => 'e-perpus@gmail.com',
            'alamat' => 'SMKN 10 Jakarta Timur',
            'nomor_hp' => '8012345678910',
        ]);
    }
}
