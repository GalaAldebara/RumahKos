<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class m_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'nama_depan' => 'Administrator',
                'nama_belakang' => '',
                'level_id' => 1,
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'irza',
                'nama_depan' => 'Irza',
                'nama_belakang' => 'maulana',
                'level_id' => 2,
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'yusriyahf',
                'nama_depan' => 'Yusriyah Firjatullah',
                'nama_belakang' => 'maulana',
                'level_id' => 2,
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'iqbal',
                'nama_depan' => 'Muhammad Iqbal Makmur Al-Muniri',
                'nama_belakang' => 'maulana',
                'level_id' => 2,
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'arya',
                'nama_depan' => 'Arya Bagus Putra Pratama',
                'nama_belakang' => 'maulana',
                'level_id' => 2,
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'dido',
                'nama_depan' => 'Dido',
                'nama_belakang' => 'maulana',
                'level_id' => 2,
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
